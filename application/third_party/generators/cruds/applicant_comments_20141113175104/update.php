<div id="applicant_comment" class="update">
    <?php 
    echo validation_errors();
    echo form_open('applicantcomment/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $applicantComment->id); ?>" />      
          
      Commenter User Id: <input type="text" name="commenter_user_id" value="<?php echo set_value('commenter_user_id', $applicantComment->commenter_user_id); ?>" />      
          
      Applicant User Id: <input type="text" name="applicant_user_id" value="<?php echo set_value('applicant_user_id', $applicantComment->applicant_user_id); ?>" />      
          
      Date: <input type="text" name="date" value="<?php echo set_value('date', $applicantComment->date); ?>" />      
          
      Comment: <textarea name="comment"><?php echo set_value('comment', $applicantComment->comment); ?></textarea>      
        <a href="<?php echo site_url('applicantcomment/read/'  . $applicantComment->id); ?>">Cancel</a> | 
    <button>Update</button>
  </form>
</div>