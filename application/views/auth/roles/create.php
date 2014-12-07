<div id="role" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('role/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
        <a href="<?php echo site_url('role'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>