<div id="permission" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('permission/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $permission->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $permission->name); ?>" />      
        <a href="<?php echo site_url('permission/read/'  . $permission->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>