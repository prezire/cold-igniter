<div id="privilege" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('privilege/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $privilege->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $privilege->name); ?>" />      
        <a href="<?php echo site_url('privilege/read/'  . $privilege->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>