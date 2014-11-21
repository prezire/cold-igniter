<div id="organization" class="read row">
  <h4></h4>
            
      Id: <?php echo $organization->id; ?>      
          
      Name: <?php echo $organization->name; ?>      
          
      Description: <?php echo $organization->description; ?>      
          
      Address: <?php echo $organization->address; ?>      
          
      Landline: <?php echo $organization->landline; ?>      
          
      Mobile: <?php echo $organization->mobile; ?>      
          
      Fax: <?php echo $organization->fax; ?>      
        <a href="<?php echo site_url('organization'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('organization/update'); ?>" class="button radius small">Update</a>
  </form>
</div>