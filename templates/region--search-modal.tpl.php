<?php

  /**
   * @file
   * The template for the search_modal region
   *
   */
?>

<?php if ($content): ?>

  <div class="lafayette-dss-modal" id="advanced-search-modal" tabindex="-1" role="dialog" aria-labelledby="Advanced Search Modal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close advanced-search-modal-close" data-dismiss="modal" data-width="560" aria-hidden="true">Close</button>
	  <h4 class="modal-title">Advanced Search</h4>
        </div>
        <div class="modal-body">

          <?php print $content; ?>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<?php endif; ?>
