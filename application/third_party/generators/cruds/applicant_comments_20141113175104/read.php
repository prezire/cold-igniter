<div id="applicant_comment" class="read">
            
      Id: <?php echo $applicantComment->id; ?>      
          
      Commenter User Id: <?php echo $applicantComment->commenter_user_id; ?>      
          
      Applicant User Id: <?php echo $applicantComment->applicant_user_id; ?>      
          
      Date: <?php echo $applicantComment->date; ?>      
          
      Comment: <?php echo $applicantComment->comment; ?>      
        <a href="<?php echo site_url('applicantcomment'); ?>">Back</a> | 
    <a href="<?php echo site_url('applicantcomment/update'); ?>">Update</a>
  </form>
</div>