<?php

/**
 * @file template.php
 * @author griffinj@lafayette.edu
 * This file contains the primary theme hooks found within any given Drupal 7.x theme
 * 
 * @todo Implement some Drupal theming hooks
 */

  // Includes functions to create Islandora Solr blocks.
require_once dirname(__FILE__) . '/includes/blocks.inc';
require_once dirname(__FILE__) . '/includes/forms.inc';
require_once dirname(__FILE__) . '/includes/menus.inc';

/**
 * Preprocess variables for page.tpl.php
 *
 * @see page.tpl.php
 */

function bootstrap_lafayette_lib_dss_preprocess_page(&$variables) {

  // Add information about the number of sidebars.
  if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
    $variables['columns'] = 3;

  }
  elseif (!empty($variables['page']['sidebar_first'])) {
    $variables['columns'] = 2;
  }
  elseif (!empty($variables['page']['sidebar_second'])) {
    $variables['columns'] = 2;
  }
  else {
    $variables['columns'] = 1;
  }

  // Primary nav
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    // Build links
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
    // Provide default theme wrapper function
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }

  // Secondary nav
  $variables['secondary_nav'] = FALSE;
  if ($variables['secondary_menu']) {
    // Build links
    $variables['secondary_nav'] = menu_tree(variable_get('menu_secondary_links_source', 'user-menu'));
    // Provide default theme wrapper function
    $variables['secondary_nav']['#theme_wrappers'] = array('menu_tree__secondary');
  }

  // The "Contact Us" link
  $variables['contact_anchor'] = l(t('Contact Us'), '', array('attributes' => array('data-toggle' => 'lafayette-dss-modal',
										    'data-target' => '#contact'),
							      'fragment' => ' ',
							      'external' => TRUE));

  // The "Log In" link
  $variables['auth_anchor'] = l(t('Log In'), '', array('attributes' => array('data-toggle' => 'lafayette-dss-modal',
									     'data-target' => '#auth-modal'),
						       'fragment' => ' ',
						       'external' => TRUE));

  // The "Log Out" link
  $variables['logout_anchor'] = l(t('Log Out'), 'user/logout');

  // The "Share" link
  $variables['share_anchor'] = l(t('Share'), '', array('attributes' => array('data-toggle' => 'lafayette-dss-modal',
									     'data-target' => '#share-modal'),
						       'fragment' => ' ',
						       'external' => TRUE));

  // Render thumbnails for authenticated users
  // By default, use a glyphicon
  $variables['user_picture'] = '<span class="icon-large icon-user"></span>';

  if(user_is_logged_in()) {

    // For the user thumbnail
    global $user;
    $user_view = user_view($user);
    $variables['user_picture'] = drupal_render($user_view['user_picture']);
  }

  // Ensure that "home" always exists for the breadcrumbs
  if(empty($variables['breadcrumb'])) {

    $variables['breadcrumb'] = '<ul class="breadcrumb"><li>' . l(t('Home'), $variables['front_page']) . '</li></ul>';
  }

  // Work-around for the logo image
  $variables['dss_logo_image'] = theme_image(array('path' => drupal_get_path('theme', 'bootstrap_lafayette_lib_dss') . '/files/dss_logo.png',
						   'alt' => t('digital scholarship services logo'),
						   'attributes' => array()));

}

/**
 * Implements template_preprocess_hybridauth_widget
 * @griffinj
 *
 */
function bootstrap_lafayette_lib_dss_preprocess_hybridauth_widget(&$vars) {

  // Refactor
  $i = 0;
  foreach (hybridauth_get_enabled_providers() as $provider_id => $provider_name) {

    //$vars['providers'][$i] .= preg_replace('/(<\/span>)/', "</span><span>&nbsp;$provider_name</span>", $vars['providers'][$i]);
    //if(preg_match('/<span class="sharethis-anchor-wrapper"><\/span>/', $vars['providers'][$i])) {

    $vars['providers'][$i] = preg_replace('/(<\/span>)/', "</span><span>&nbsp;$provider_name</span>", $vars['providers'][$i]);
    $i++;
      //}
  }
}

/**
 * Implements template_preprocess_html
 *
 */
function bootstrap_lafayette_lib_dss_preprocess_html(&$variables) {

  drupal_add_library('system', 'effects.drop');
  drupal_add_library('system', 'effects.slide');
}

/**
 * Template preprocess function for hybridauth_widget.
 */
/*
function template_preprocess_hybridauth_widget(&$vars, $hook) {

}
*/

function bootstrap_lafayette_lib_dss_theme_registry_alter(&$registry) {

  $registry['hybridauth_widget']['file'] = 'template';
}

/**
 * Implements hook_theme().
 */
/*
function hybridauth_theme($existing, $type, $theme, $path) {
  return array(
    'hybridauth_admin_settings_providers_table' => array(
      'render element' => 'form',
      'file' => 'hybridauth.admin.inc',
    ),
    'hybridauth_widget' => array(
      'render element' => 'element',
      'template' => 'templates/hybridauth_widget',
      'file' => 'hybridauth.theme.inc',
    ),
}
*/
