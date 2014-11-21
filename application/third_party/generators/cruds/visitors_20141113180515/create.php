<div id="visitor" class="create">
    <?php 
    echo validation_errors();
    echo form_open('visitor/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      User Id: <input type="text" name="user_id" />      
          
      Purpose: <textarea name="purpose"></textarea>      
          
      Person To Visit: <input type="text" name="person_to_visit" />      
          
      Company: <input type="text" name="company" />      
          
      Date Time In: <input type="text" name="date_time_in" />      
          
      Date Time Out: <input type="text" name="date_time_out" />      
        <a href="<?php echo site_url('visitor'); ?>">Cancel</a> | 
    <button>Create</button>
  </form>
</div>