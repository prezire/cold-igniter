<div id="resume" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('resume/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Headline: <input type="text" name="headline" />      
          
      Applicant Id: <input type="text" name="applicant_id" />      
          
      Availability: <input type="text" name="availability" />      
          
      Current Industry: <input type="text" name="current_industry" />      
          
      Qualification: <input type="text" name="qualification" />      
          
      Summary: <textarea name="summary"></textarea>      
        <a href="<?php echo site_url('resume'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>