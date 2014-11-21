<div id="collector" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('collector/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $collector->id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $collector->user_id); ?>" />      
          
      Public Name: <input type="text" name="public_name" value="<?php echo set_value('public_name', $collector->public_name); ?>" />      
        <a href="<?php echo site_url('collector/read/'  . $collector->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>