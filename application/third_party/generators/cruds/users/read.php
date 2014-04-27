<div id="user" class="read">
            
      Id: <?php echo user->id; ?>      
          
      Username: <?php echo user->username; ?>      
        <a href="<?php echo site_url('user'); ?>">Back</a> | 
    <a href="<?php echo site_url('user/update'); ?>">Update</a>
  </form>
</div>