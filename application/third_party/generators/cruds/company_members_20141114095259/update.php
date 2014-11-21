<div id="company_member" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('companymember/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $companyMember->id); ?>" />      
          
      Company Id: <input type="text" name="company_id" value="<?php echo set_value('company_id', $companyMember->company_id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $companyMember->user_id); ?>" />      
        <a href="<?php echo site_url('companymember/read/'  . $companyMember->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>