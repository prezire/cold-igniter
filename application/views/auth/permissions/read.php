<div id="permission" class="read row">
  <h4></h4>
            
      Id: <?php echo $permission->id; ?>      
          
      Name: <?php echo $permission->name; ?>      
        <a href="<?php echo site_url('permission'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('permission/update'); ?>" class="button radius small">Update</a>
  </form>
</div>