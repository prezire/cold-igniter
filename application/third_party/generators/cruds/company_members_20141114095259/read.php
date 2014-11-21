<div id="company_member" class="read row">
  <h4></h4>
            
      Id: <?php echo $companyMember->id; ?>      
          
      Company Id: <?php echo $companyMember->company_id; ?>      
          
      User Id: <?php echo $companyMember->user_id; ?>      
        <a href="<?php echo site_url('companymember'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('companymember/update'); ?>" class="button radius small">Update</a>
  </form>
</div>