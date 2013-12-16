# Lafayette College Libraries
## Bootstrap Sub-theme for Islandora/Drupal 7.x
* Please note that this currently only serves as a testing environment for integrating functional testing into a distributed UI development environment
* Also note this theme shall serve as a template for developing sub-themes for Islandora Virtual Research Environments

[![Build Status](https://travis-ci.org/LafayetteCollegeLibraries/islandoraThemeDev.png)](https://travis-ci.org/LafayetteCollegeLibraries/islandoraThemeDev) [![Coverage Status](https://coveralls.io/repos/LafayetteCollegeLibraries/islandoraThemeDev/badge.png)](https://coveralls.io/r/LafayetteCollegeLibraries/islandoraThemeDev) [![Code Climate](https://codeclimate.com/github/LafayetteCollegeLibraries/islandoraThemeDev.png)](https://codeclimate.com/github/LafayetteCollegeLibraries/islandoraThemeDev)

### Installing the Theme

#### Enabling the Theme
1. Ensure that [the ctools module]() is installed and enabled
1. Ensure that [the jquery_update module]() is installed and enabled
  1. drush -y en jquery_update
2. Set the version of jQuery to 1.7 (or later)
  2. drush vset --format=string jquery_update_jquery_version 1.7
3. Install and enable [the bootstrap base theme (7.x-2.2)]()
  1. drush -y dl bootstrap-7.x-2.2
  2. drush -y en bootstrap
4. Download and enable to [DRUPAL_PATH/sites/all/themes]
  1. git clone [/LafayetteCollegeLibraries/islandoraThemeDev]() bootstrap_dss_islandora_dev
  2. drush -y en bootstrap_dss_islandora_dev
5. Set the default theme
  1. drush vset bootstrap_dss_islandora_dev

#### Installing Secondary Module Dependencies
1. Install and enable [the islandora module]()
2. Install and enable [the islandora_solr module]()
  1. (Optional) Install and enable [the islandora_dss_solr module]()
  2. Rename the islandora_simple_search block title to "<none>"
  3. Rename the islandora_advanced_search block title to "<none>"
  4. Ensure that anonymous users can search Islandora using Solr
3. Install and enable [the hybridauth module]()
  1. Install php-curl
  2. Install the [HybridAuth library](http://hybridauth.sourceforge.net/download.html)
  3. Unzip the contents of the release into /sites/all/libraries/hybridauth
  4. Configure at admin/config/people/hybridauth
    1. Disable the "User login form" and "User login block"
  3. Rename the hybrid_auth block title to "<none>"
  4. Ensure that anonymous users can authenticate using HybridAuth
4. Install and enable [the sharethis module]()
  1. admin/config/services/sharethis
    1. Widget: Direct-Post
	  1. drush vset --format=string sharethis_widget_option st_direct
	2. Location: Block
	  1. drush vset --format=string sharethis_location block
	3. Services: Facebook and Twitter
	  1. drush vset --format=string sharethis_service_option '"Facebook:facebook","Tweet:twitter"'
5. Install and enable [the webform module]()
6. Disable the links "My account" and "Log out" for the menu "user-menu"
