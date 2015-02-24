<div id="organization" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('organization/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
          
      Address: <input type="text" name="address" />      
          
      City: <input type="text" name="city" />      
          
      State: <input type="text" name="state" />      
          
      Country: <input type="text" name="country" />      
          
      Zip Code: <input type="text" name="zip_code" />      
          
      Landline: <input type="text" name="landline" />      
          
      Mobile: <input type="text" name="mobile" />      
          
      Fax: <input type="text" name="fax" />      
          
      Email: <input type="text" name="email" />      
        <a href="<?php echo site_url('organization'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>