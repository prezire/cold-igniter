<div id="organization_member" class="update row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('organizationmember/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $organizationMember->id); ?>" />      
          
      Organization Id: <input type="text" name="organization_id" value="<?php echo set_value('organization_id', $organizationMember->organization_id); ?>" />      
          
      User Id: <input type="text" name="user_id" value="<?php echo set_value('user_id', $organizationMember->user_id); ?>" />      
        <a href="<?php echo site_url('organizationmember/read/'  . $organizationMember->id); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Update</button>
  </form>
</div>