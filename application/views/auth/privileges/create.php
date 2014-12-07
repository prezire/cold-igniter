<div id="privilege" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('privilege/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
        <a href="<?php echo site_url('privilege'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>