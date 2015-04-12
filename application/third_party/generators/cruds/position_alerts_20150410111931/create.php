<div id="position_alert" class="create row">
  <h4>Position Alert</h4>
    <?php 
      echo validation_errors();
      echo form_open('positionalert/create'); 
    ?>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">        
          Id: <input type="text" name="id" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Email: <input type="text" name="email" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Frequency: <?php echo form_dropdown('frequency', $frequencies); ?>      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Keywords: <input type="text" name="keywords" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Date Time Created: <input type="text" name="date_time_created" />      
      </div>  
    </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('positionalert'); ?>" class="button tiny alert">Cancel</a>
          <button class="button tiny">Create</button>
        </div>
      </div>
  </form>
</div>