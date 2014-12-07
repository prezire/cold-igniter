<div id="user" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('user/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Full Name: <input type="text" name="full_name" />      
          
      Title: <input type="text" name="title" />      
          
      Email: <input type="text" name="email" />      
          
      Password: <input type="text" name="password" />      
          
      Date Of Birth: <input type="text" name="date_of_birth" />      
          
      Address: <input type="text" name="address" />      
          
      Country: <input type="text" name="country" />      
          
      Landline: <input type="text" name="landline" />      
          
      Mobile: <input type="text" name="mobile" />      
          
      Enabled: <input type="checkbox" name="enabled" />      
          
      Role Id: <input type="text" name="role_id" />      
        <a href="<?php echo site_url('user'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>