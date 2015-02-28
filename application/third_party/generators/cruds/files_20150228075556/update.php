<div id="file" class="update row">
  <h4>File</h4>
    <?php 
      echo validation_errors();
      echo form_open('file/update'); 
    ?>    
    <div class="row">  
      <div class="small-12 medium-12 large-12 columns">
          Id: <input type="text" name="id" value="<?php echo set_value('id', $file->id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Name: <input type="text" name="name" value="<?php echo set_value('name', $file->name); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Filename: <input type="file" name="filename" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Description: <textarea name="description"><?php echo set_value('description', $file->description); ?></textarea>      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Owner User Id: <input type="text" name="owner_user_id" value="<?php echo set_value('owner_user_id', $file->owner_user_id); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Date Time Created: <input type="text" name="date_time_created" value="<?php echo set_value('date_time_created', $file->date_time_created); ?>" />      
      </div>
      <div class="small-12 medium-12 large-12 columns">
          Enabled: <input type="checkbox" name="enabled" checked="<?php echo set_value('enabled',  $file->enabled); ?>" />      
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a href="<?php echo site_url('file/update/'  . $file->id); ?>" class="button tiny alert">Cancel</a>
        <button class="button tiny">Update</button>
      </div>
    </div>
  </form>
</div>