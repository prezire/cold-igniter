<div id="company" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('company/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
          
      Description: <textarea name="description"></textarea>      
          
      Address: <input type="text" name="address" />      
          
      Landline: <input type="text" name="landline" />      
          
      Mobile: <input type="text" name="mobile" />      
          
      Fax: <input type="text" name="fax" />      
        <a href="<?php echo site_url('company'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>