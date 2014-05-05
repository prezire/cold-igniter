<div id="user" class="read">
            
      Id: <?php echo user->id; ?>      
          
      Full Name: <?php echo user->full_name; ?>      
          
      Title: <?php echo user->title; ?>      
          
      Address: <?php echo user->address; ?>      
          
      Postal Code: <?php echo user->postal_code; ?>      
          
      Email: <?php echo user->email; ?>      
          
      Mobile: <?php echo user->mobile; ?>      
          
      Ic Number: <?php echo user->ic_number; ?>      
          
      : <?php echo user->; ?>      
          
      Website: <?php echo user->website; ?>      
          
      Facebook: <?php echo user->facebook; ?>      
          
      Biography: <?php echo user->biography; ?>      
        <a href="<?php echo site_url('user'); ?>">Back</a> | 
    <a href="<?php echo site_url('user/update'); ?>">Update</a>
  </form>
</div>