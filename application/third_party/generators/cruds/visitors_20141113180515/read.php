<div id="visitor" class="read">
            
      Id: <?php echo $visitor->id; ?>      
          
      User Id: <?php echo $visitor->user_id; ?>      
          
      Purpose: <?php echo $visitor->purpose; ?>      
          
      Person To Visit: <?php echo $visitor->person_to_visit; ?>      
          
      Company: <?php echo $visitor->company; ?>      
          
      Date Time In: <?php echo $visitor->date_time_in; ?>      
          
      Date Time Out: <?php echo $visitor->date_time_out; ?>      
        <a href="<?php echo site_url('visitor'); ?>">Back</a> | 
    <a href="<?php echo site_url('visitor/update'); ?>">Update</a>
  </form>
</div>