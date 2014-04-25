<div id="sub_page" class="read">
            
      Id: <?php echo subPage->id; ?>      
          
      Title: <?php echo subPage->title; ?>      
          
      Description: <?php echo subPage->description; ?>      
          
      Enabled: <?php echo subPage->enabled; ?>      
        <a href="<?php echo site_url('subpage'); ?>">Back</a> | 
    <a href="<?php echo site_url('subpage/update'); ?>">Update</a>
  </form>
</div>