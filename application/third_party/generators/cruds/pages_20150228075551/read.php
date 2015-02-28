<div id="page" class="read row">
  <h4></h4>
            
      Id: <?php echo $page->id; ?>      
          
      Name: <?php echo $page->name; ?>      
          
      Description: <?php echo $page->description; ?>      
          
      Date Time Created: <?php echo $page->date_time_created; ?>      
          
      Enabled: <?php echo $page->enabled; ?>      
        <a href="<?php echo site_url('page'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('page/update'); ?>" class="button radius small">Update</a>
  </form>
</div>