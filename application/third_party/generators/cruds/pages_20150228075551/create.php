<div id="page" class="create row">
  <h4>Page</h4>
    <?php 
      echo validation_errors();
      echo form_open('page/create'); 
    ?>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">        
          Id: <input type="text" name="id" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Name: <input type="text" name="name" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Description: <textarea name="description"></textarea>      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Date Time Created: <input type="text" name="date_time_created" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Enabled: <input type="checkbox" name="enabled" />      
      </div>  
    </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('page'); ?>" class="button tiny alert">Cancel</a>
          <button class="button tiny">Create</button>
        </div>
      </div>
  </form>
</div>