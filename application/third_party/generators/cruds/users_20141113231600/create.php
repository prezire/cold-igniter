<div id="user" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('user/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Full Name: <input type="text" name="full_name" />      
          
      Email: <input type="text" name="email" />      
          
      Password: <input type="text" name="password" />      
          
      Address: <input type="text" name="address" />      
          
      Title: <input type="text" name="title" />      
          
      Enabled: <input type="checkbox" name="enabled" />      
        <a href="<?php echo site_url('user'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>