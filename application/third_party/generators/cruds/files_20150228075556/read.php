<div id="file" class="read row">
  <h4></h4>
            
      Id: <?php echo $file->id; ?>      
          
      Name: <?php echo $file->name; ?>      
          
      Filename: <?php echo $file->filename; ?>      
          
      Description: <?php echo $file->description; ?>      
          
      Owner User Id: <?php echo $file->owner_user_id; ?>      
          
      Date Time Created: <?php echo $file->date_time_created; ?>      
          
      Enabled: <?php echo $file->enabled; ?>      
        <a href="<?php echo site_url('file'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('file/update'); ?>" class="button radius small">Update</a>
  </form>
</div>