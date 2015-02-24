<div id="student" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('student/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Full Name: <input type="text" name="full_name" />      
          
      Email: <input type="text" name="email" />      
          
      :       
        <a href="<?php echo site_url('student'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>