<div id="role" class="update row">
  <h4>Update Role</h4>
    <div data-alert class="alert-box hide">
      <?php echo validation_errors(); ?>
      <a href="#" class="close">&times;</a>
    </div>
    <?php echo form_open('role/update'); ?>          
      <input type="hidden" name="id" value="<?php echo set_value('id', $role->id); ?>" />      
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          Name: <input type="text" name="name" value="<?php echo set_value('name', $role->name); ?>" />
        </div>
      </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('role/read/' . $role->id); ?>" class="button radius small alert">
            Cancel
          </a>
          <button class="button radius small">
            Update
          </button>
        </div>
      </div>
  </form>
</div>