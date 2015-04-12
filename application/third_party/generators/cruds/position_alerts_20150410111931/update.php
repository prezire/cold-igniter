<div id="position_alert" class="update row">
  <h4>Position Alert</h4>
    <?php 
      echo validation_errors();
      echo form_open('positionalert/update'); 
    ?>    
    <div class="row">  
      <div class="small-12 medium-12 large-12 columns">
          Id: <input type="text" name="id" value="<?php echo set_value('id', $positionAlert->id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Email: <input type="text" name="email" value="<?php echo set_value('email', $positionAlert->email); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Frequency: <?php echo form_dropdown('frequency', $frequencies, set_value('frequency',  $positionAlert->frequency)); ?>      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Keywords: <input type="text" name="keywords" value="<?php echo set_value('keywords', $positionAlert->keywords); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Date Time Created: <input type="text" name="date_time_created" value="<?php echo set_value('date_time_created', $positionAlert->date_time_created); ?>" />      
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a href="<?php echo site_url('positionalert/update/'  . $positionAlert->id); ?>" class="button tiny alert">Back</a>
        <button class="button tiny">Update</button>
      </div>
    </div>
  </form>
</div>