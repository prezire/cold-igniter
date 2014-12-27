<div id="resume" class="read row">
  <h4></h4>
            
      Id: <?php echo $resume->id; ?>      
          
      Headline: <?php echo $resume->headline; ?>      
          
      Applicant Id: <?php echo $resume->applicant_id; ?>      
          
      Availability: <?php echo $resume->availability; ?>      
          
      Current Industry: <?php echo $resume->current_industry; ?>      
          
      Qualification: <?php echo $resume->qualification; ?>      
          
      Summary: <?php echo $resume->summary; ?>      
        <a href="<?php echo site_url('resume'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('resume/update'); ?>" class="button radius small">Update</a>
  </form>
</div>