<div id="comment" class="create row">
  <h4>Comment</h4>
    <?php 
      echo validation_errors();
      echo form_open('comment/create'); 
    ?>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">        
          Id: <input type="text" name="id" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Page Id: <input type="text" name="page_id" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Message: <input type="text" name="message" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          From User Id: <input type="text" name="from_user_id" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Date Time Posted: <input type="text" name="date_time_posted" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Approved: <input type="checkbox" name="approved" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Approved By User Id: <input type="text" name="approved_by_user_id" />      
      </div>  
      <div class="small-12 medium-12 large-12 columns">        
          Enabled: <input type="checkbox" name="enabled" />      
      </div>  
    </div>
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <a href="<?php echo site_url('comment'); ?>" class="button tiny alert">Cancel</a>
          <button class="button tiny">Create</button>
        </div>
      </div>
  </form>
</div>