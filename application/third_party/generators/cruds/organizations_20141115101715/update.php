<div id="organization" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('organization/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $organization->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $organization->name); ?>" />      
          
      Description: <input type="text" name="description" value="<?php echo set_value('description', $organization->description); ?>" />      
          
      Address: <input type="text" name="address" value="<?php echo set_value('address', $organization->address); ?>" />      
          
      Landline: <input type="text" name="landline" value="<?php echo set_value('landline', $organization->landline); ?>" />      
          
      Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $organization->mobile); ?>" />      
          
      Fax: <input type="text" name="fax" value="<?php echo set_value('fax', $organization->fax); ?>" />      
        <a href="<?php echo site_url('organization/read/'  . $organization->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>