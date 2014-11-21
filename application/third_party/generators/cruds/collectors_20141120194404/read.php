<div id="collector" class="read row">
  <h4></h4>
            
      Id: <?php echo $collector->id; ?>      
          
      User Id: <?php echo $collector->user_id; ?>      
          
      Public Name: <?php echo $collector->public_name; ?>      
        <a href="<?php echo site_url('collector'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('collector/update'); ?>" class="button radius small">Update</a>
  </form>
</div>