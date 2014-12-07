<div id="role" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('role/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $role->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $role->name); ?>" />      
        <a href="<?php echo site_url('role/read/'  . $role->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>