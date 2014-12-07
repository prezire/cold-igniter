<div id="permission" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('permission/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
        <a href="<?php echo site_url('permission'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>