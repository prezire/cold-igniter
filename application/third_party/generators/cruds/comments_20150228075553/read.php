<div id="comment" class="read row">
  <h4></h4>
            
      Id: <?php echo $comment->id; ?>      
          
      Page Id: <?php echo $comment->page_id; ?>      
          
      Message: <?php echo $comment->message; ?>      
          
      From User Id: <?php echo $comment->from_user_id; ?>      
          
      Date Time Posted: <?php echo $comment->date_time_posted; ?>      
          
      Approved: <?php echo $comment->approved; ?>      
          
      Approved By User Id: <?php echo $comment->approved_by_user_id; ?>      
          
      Enabled: <?php echo $comment->enabled; ?>      
        <a href="<?php echo site_url('comment'); ?>" class="button radius small alert">Back</a>
    <a href="<?php echo site_url('comment/update'); ?>" class="button radius small">Update</a>
  </form>
</div>