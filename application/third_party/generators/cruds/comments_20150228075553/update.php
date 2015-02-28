<div id="comment" class="update row">
  <h4>Comment</h4>
    <?php 
      echo validation_errors();
      echo form_open('comment/update'); 
    ?>    
    <div class="row">  
      <div class="small-12 medium-12 large-12 columns">
          Id: <input type="text" name="id" value="<?php echo set_value('id', $comment->id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Page Id: <input type="text" name="page_id" value="<?php echo set_value('page_id', $comment->page_id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Message: <input type="text" name="message" value="<?php echo set_value('message', $comment->message); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          From User Id: <input type="text" name="from_user_id" value="<?php echo set_value('from_user_id', $comment->from_user_id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Date Time Posted: <input type="text" name="date_time_posted" value="<?php echo set_value('date_time_posted', $comment->date_time_posted); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Approved: <input type="checkbox" name="approved" checked="<?php echo set_value('approved',  $comment->approved); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Approved By User Id: <input type="text" name="approved_by_user_id" value="<?php echo set_value('approved_by_user_id', $comment->approved_by_user_id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Enabled: <input type="checkbox" name="enabled" checked="<?php echo set_value('enabled',  $comment->enabled); ?>" />      
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a href="<?php echo site_url('comment/update/'  . $comment->id); ?>" class="button tiny alert">Cancel</a>
        <button class="button tiny">Update</button>
      </div>
    </div>
  </form>
</div>