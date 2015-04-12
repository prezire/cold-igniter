<div id="position_alert" class="read row">
  <h4>Position Alert</h4>
    <div class="row">
  <div class="small-12 medium-12 large-12 columns">  
        Id: <?php echo $positionAlert->id; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Email: <?php echo $positionAlert->email; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Frequency: <?php echo $positionAlert->frequency; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Keywords: <?php echo $positionAlert->keywords; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Country: <?php echo $positionAlert->country; ?>    </div>
  <div class="small-12 medium-12 large-12 columns">  
        Date Time Created: <?php echo $positionAlert->date_time_created; ?>    </div>
</div>
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo site_url('positionalert'); ?>" class="button tiny alert">Back</a>
      <a href="<?php echo site_url('positionalert/update'); ?>" class="button tiny">Update</a>
    </div>
  </div>
</div>