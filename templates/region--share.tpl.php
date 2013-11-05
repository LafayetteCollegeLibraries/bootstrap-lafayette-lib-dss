<?php

  /**
   * @file
   * For theming the authentication region
   *
   */
?>

<?php if ($content): ?>

  <div class="lafayette-dss-modal" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="Content Sharing Modal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  <h4 class="modal-title">Share</h4>
        </div>
        <div class="modal-body">

          <?php print render($content); ?>
        </div>

	<button id="share-modal-help" class="btn btn-default" data-content="Share help message." data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-original-title="" title=""><i class="icon-question-sign"></i></button>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif; ?>