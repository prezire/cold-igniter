<div id="organization_member" class="read row">
  <h4></h4>
            
      Id: <?php echo $organizationMember->id; ?>      
          
      Organization Id: <?php echo $organizationMember->organization_id; ?>      
          
      User Id: <?php echo $organizationMember->user_id; ?>      
        <a href="<?php echo site_url('organizationmember'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('organizationmember/update'); ?>" class="button radius small">Update</a>
  </form>
</div>