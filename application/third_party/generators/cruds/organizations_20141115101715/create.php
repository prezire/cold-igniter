<div id="organization" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('organization/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
          
      Description: <input type="text" name="description" />      
          
      Address: <input type="text" name="address" />      
          
      Landline: <input type="text" name="landline" />      
          
      Mobile: <input type="text" name="mobile" />      
          
      Fax: <input type="text" name="fax" />      
        <a href="<?php echo site_url('organization'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>