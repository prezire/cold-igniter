<div id="permission" class="update row">
  <h4>Update Permission</h4>
  <div data-alert class="alert-box hide">
    <?php echo validation_errors(); ?>
    <a href="#" class="close">&times;</a>
  </div>
  <?php echo form_open('permission/update'); ?>         
      <input type="hidden" name="id" value="<?php echo set_value('id', $permission->id); ?>" />
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          Name: <input type="text" name="name" value="<?php echo set_value('name', $permission->name); ?>" />
        </div>
      </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('permission/'); ?>" class="button tiny alert">
            Cancel
          </a>
          <button class="button tiny">
            Update
          </button>
        </div>
      </div>
  </form>
</div>