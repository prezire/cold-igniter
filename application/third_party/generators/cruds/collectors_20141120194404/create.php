<div id="collector" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('collector/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      User Id: <input type="text" name="user_id" />      
          
      Public Name: <input type="text" name="public_name" />      
        <a href="<?php echo site_url('collector'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>