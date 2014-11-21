<div id="company" class="read row">
  <h4></h4>
            
      Id: <?php echo $company->id; ?>      
          
      Name: <?php echo $company->name; ?>      
          
      Description: <?php echo $company->description; ?>      
          
      Address: <?php echo $company->address; ?>      
          
      Landline: <?php echo $company->landline; ?>      
          
      Mobile: <?php echo $company->mobile; ?>      
          
      Fax: <?php echo $company->fax; ?>      
        <a href="<?php echo site_url('company'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('company/update'); ?>" class="button radius small">Update</a>
  </form>
</div>