<div id="organization_member" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('organizationmember/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Organization Id: <input type="text" name="organization_id" />      
          
      User Id: <input type="text" name="user_id" />      
        <a href="<?php echo site_url('organizationmember'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>