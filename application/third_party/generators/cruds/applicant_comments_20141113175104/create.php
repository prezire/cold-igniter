<div id="applicant_comment" class="create">
    <?php 
    echo validation_errors();
    echo form_open('applicantcomment/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Commenter User Id: <input type="text" name="commenter_user_id" />      
          
      Applicant User Id: <input type="text" name="applicant_user_id" />      
          
      Date: <input type="text" name="date" />      
          
      Comment: <textarea name="comment"></textarea>      
        <a href="<?php echo site_url('applicantcomment'); ?>">Cancel</a> | 
    <button>Create</button>
  </form>
</div>