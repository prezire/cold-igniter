<div id="organization" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('organization/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $organization->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $organization->name); ?>" />      
          
      Address: <input type="text" name="address" value="<?php echo set_value('address', $organization->address); ?>" />      
          
      City: <input type="text" name="city" value="<?php echo set_value('city', $organization->city); ?>" />      
          
      State: <input type="text" name="state" value="<?php echo set_value('state', $organization->state); ?>" />      
          
      Country: <input type="text" name="country" value="<?php echo set_value('country', $organization->country); ?>" />      
          
      Zip Code: <input type="text" name="zip_code" value="<?php echo set_value('zip_code', $organization->zip_code); ?>" />      
          
      Landline: <input type="text" name="landline" value="<?php echo set_value('landline', $organization->landline); ?>" />      
          
      Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $organization->mobile); ?>" />      
          
      Fax: <input type="text" name="fax" value="<?php echo set_value('fax', $organization->fax); ?>" />      
          
      Email: <input type="text" name="email" value="<?php echo set_value('email', $organization->email); ?>" />      
        <a href="<?php echo site_url('organization/read/'  . $organization->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>