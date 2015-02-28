<div id="page" class="update row">
  <h4>Page</h4>
    <?php 
      echo validation_errors();
      echo form_open('page/update'); 
    ?>    
    <div class="row">  
      <div class="small-12 medium-12 large-12 columns">
          Id: <input type="text" name="id" value="<?php echo set_value('id', $page->id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Name: <input type="text" name="name" value="<?php echo set_value('name', $page->name); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Description: <textarea name="description"><?php echo set_value('description', $page->description); ?></textarea>      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Date Time Created: <input type="text" name="date_time_created" value="<?php echo set_value('date_time_created', $page->date_time_created); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Enabled: <input type="checkbox" name="enabled" checked="<?php echo set_value('enabled',  $page->enabled); ?>" />      
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a href="<?php echo site_url('page/update/'  . $page->id); ?>" class="button tiny alert">Cancel</a>
        <button class="button tiny">Update</button>
      </div>
    </div>
  </form>
</div>