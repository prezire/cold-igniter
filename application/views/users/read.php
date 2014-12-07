<div id="user" class="read row">
  <h4></h4>
            
      Id: <?php echo $user->id; ?>      
          
      Full Name: <?php echo $user->full_name; ?>      
          
      Title: <?php echo $user->title; ?>      
          
      Email: <?php echo $user->email; ?>      
          
      Password: <?php echo $user->password; ?>      
          
      Date Of Birth: <?php echo $user->date_of_birth; ?>      
          
      Address: <?php echo $user->address; ?>      
          
      Country: <?php echo $user->country; ?>      
          
      Landline: <?php echo $user->landline; ?>      
          
      Mobile: <?php echo $user->mobile; ?>      
          
      Enabled: <?php echo $user->enabled; ?>      
          
      Role Id: <?php echo $user->role_id; ?>      
        <a href="<?php echo site_url('user'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('user/update'); ?>" class="button radius small">Update</a>
  </form>
</div>