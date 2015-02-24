<div id="organization" class="read row">
  <h4></h4>
            
      Id: <?php echo $organization->id; ?>      
          
      Name: <?php echo $organization->name; ?>      
          
      Address: <?php echo $organization->address; ?>      
          
      City: <?php echo $organization->city; ?>      
          
      State: <?php echo $organization->state; ?>      
          
      Country: <?php echo $organization->country; ?>      
          
      Zip Code: <?php echo $organization->zip_code; ?>      
          
      Landline: <?php echo $organization->landline; ?>      
          
      Mobile: <?php echo $organization->mobile; ?>      
          
      Fax: <?php echo $organization->fax; ?>      
          
      Email: <?php echo $organization->email; ?>      
        <a href="<?php echo site_url('organization'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('organization/update'); ?>" class="button radius small">Update</a>
  </form>
</div>