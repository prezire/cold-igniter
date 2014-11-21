<div id="visitor" class="update">
    <?php 
    echo validation_errors();
    echo form_open('visitor/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $visitor->id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $visitor->user_id); ?>" />      
          
      Purpose: <textarea name="purpose"><?php echo set_value('purpose', $visitor->purpose); ?></textarea>      
          
      Person To Visit: <input type="text" name="person_to_visit" value="<?php echo set_value('person_to_visit', $visitor->person_to_visit); ?>" />      
          
      Company: <input type="text" name="company" value="<?php echo set_value('company', $visitor->company); ?>" />      
          
      Date Time In: <input type="text" name="date_time_in" value="<?php echo set_value('date_time_in', $visitor->date_time_in); ?>" />      
          
      Date Time Out: <input type="text" name="date_time_out" value="<?php echo set_value('date_time_out', $visitor->date_time_out); ?>" />      
        <a href="<?php echo site_url('visitor/read/'  . $visitor->id); ?>">Cancel</a> | 
    <button>Update</button>
  </form>
</div>