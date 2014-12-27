<div id="resume" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('resume/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $resume->id); ?>" />      
          
      Headline: <input type="text" name="headline" value="<?php echo set_value('headline', $resume->headline); ?>" />      
          
      Applicant Id: <input type="text" name="applicant_id" value="<?php echo set_value('applicant_id', $resume->applicant_id); ?>" />      
          
      Availability: <input type="text" name="availability" value="<?php echo set_value('availability', $resume->availability); ?>" />      
          
      Current Industry: <input type="text" name="current_industry" value="<?php echo set_value('current_industry', $resume->current_industry); ?>" />      
          
      Qualification: <input type="text" name="qualification" value="<?php echo set_value('qualification', $resume->qualification); ?>" />      
          
      Summary: <textarea name="summary"><?php echo set_value('summary', $resume->summary); ?></textarea>      
        <a href="<?php echo site_url('resume/read/'  . $resume->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>