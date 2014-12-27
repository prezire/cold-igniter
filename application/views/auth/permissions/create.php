<div id="permission" class="create row">
  <h4>New Permission</h4>
  <div data-alert class="alert-box hide">
    <?php echo validation_errors(); ?>
    <a href="#" class="close">&times;</a>
  </div>
  <?php echo form_open('permission/create'); ?>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        Role: <?php echo form_dropdown('role_id', $roles); ?>
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        Name: <input type="text" name="name" />
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a href="<?php echo site_url('permission'); ?>" class="button radius small alert">Cancel</a>
        <button class="button radius small">Create</button>
      </div>
    </div>
  </form>
</div>