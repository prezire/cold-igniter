<div id="user" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('user/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $user->id); ?>" />      
          
      Full Name: <input type="text" name="full_name" value="<?php echo set_value('full_name', $user->full_name); ?>" />      
          
      Title: <input type="text" name="title" value="<?php echo set_value('title', $user->title); ?>" />      
          
      Email: <input type="text" name="email" value="<?php echo set_value('email', $user->email); ?>" />      
          
      Password: <input type="text" name="password" value="<?php echo set_value('password', $user->password); ?>" />      
          
      Date Of Birth: <input type="text" name="date_of_birth" value="<?php echo set_value('date_of_birth', $user->date_of_birth); ?>" />      
          
      Address: <input type="text" name="address" value="<?php echo set_value('address', $user->address); ?>" />      
          
      Country: <input type="text" name="country" value="<?php echo set_value('country', $user->country); ?>" />      
          
      Landline: <input type="text" name="landline" value="<?php echo set_value('landline', $user->landline); ?>" />      
          
      Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile); ?>" />      
          
      Enabled: <input type="checkbox" name="enabled" checked="<?php echo set_value('enabled',  $user->enabled); ?>" />      
          
      Role Id: <input type="text" name="role_id" value="<?php echo set_value('role_id', $user->role_id); ?>" />      
        <a href="<?php echo site_url('user/read/'  . $user->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>