<div id="file" class="create row">
  <h4>File</h4>
    <?php 
      echo validation_errors();
      echo form_open('file/create'); 
    ?>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">        
          Id: <input type="text" name="id" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Name: <input type="text" name="name" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Filename: <input type="file" name="filename" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Description: <textarea name="description"></textarea>      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Owner User Id: <input type="text" name="owner_user_id" />      
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
          <a href="<?php echo site_url('file'); ?>" class="button tiny alert">Cancel</a>
          <button class="button tiny">Create</button>
        </div>
      </div>
  </form>
</div>