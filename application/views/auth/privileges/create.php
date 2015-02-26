<div id="privilege" class="create row">
  <h4>New Privilege</h4>
    <div data-alert class="alert-box hide">
      <?php echo validation_errors(); ?>
      <a href="#" class="close">&times;</a>
    </div>
    <?php echo form_open('privilege/create'); ?>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          Name: <input type="text" name="name" />
        </div>
      </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('privilege'); ?>" class="button tiny alert">Cancel</a>
          <button class="button tiny">Create</button>
        </div>
      </div>
  </form>
</div>