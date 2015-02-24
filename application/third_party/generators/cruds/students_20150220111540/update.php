<div id="student" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('student/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $student->id); ?>" />      
          
      Full Name: <input type="text" name="full_name" value="<?php echo set_value('full_name', $student->full_name); ?>" />      
          
      Email: <input type="text" name="email" value="<?php echo set_value('email', $student->email); ?>" />      
        <a href="<?php echo site_url('student/read/'  . $student->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>