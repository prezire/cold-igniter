<div id="company" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('company/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $company->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $company->name); ?>" />      
          
      Description: <textarea name="description"><?php echo set_value('description', $company->description); ?></textarea>      
          
      Address: <input type="text" name="address" value="<?php echo set_value('address', $company->address); ?>" />      
          
      Landline: <input type="text" name="landline" value="<?php echo set_value('landline', $company->landline); ?>" />      
          
      Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $company->mobile); ?>" />      
          
      Fax: <input type="text" name="fax" value="<?php echo set_value('fax', $company->fax); ?>" />      
        <a href="<?php echo site_url('company/read/'  . $company->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>