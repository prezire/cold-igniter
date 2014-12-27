<div id="privilege" class="update row">
  <h4>Update Privilege</h4>
  <div data-alert class="alert-box hide">
    <?php echo validation_errors(); ?>
    <a href="#" class="close">&times;</a>
  </div>
    <?php echo form_open('privilege/update'); ?>          
      <input type="hidden" name="id" value="<?php echo set_value('id', $privilege->id); ?>" />      
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          Name: <input type="text" name="name" value="<?php echo set_value('name', $privilege->name); ?>" />
        </div>
      </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('privilege/read/' . $privilege->id); ?>" class="button radius small alert">Cancel</a>
          <button class="button radius small">Update</button>
        </div>
      </div>
  </form>
</div>