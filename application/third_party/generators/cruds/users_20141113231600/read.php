<div id="user" class="read row">
  <h4></h4>
            
      Id: <?php echo $user->id; ?>      
          
      Full Name: <?php echo $user->full_name; ?>      
          
      Email: <?php echo $user->email; ?>      
          
      Password: <?php echo $user->password; ?>      
          
      Address: <?php echo $user->address; ?>      
          
      Title: <?php echo $user->title; ?>      
          
      Enabled: <?php echo $user->enabled; ?>      
        <a href="<?php echo site_url('user'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('user/update'); ?>" class="button radius small">Update</a>
  </form>
</div>