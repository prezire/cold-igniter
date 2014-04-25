<div id="sub_page" class="update">
    <?php echo form_open('subpage/update'); ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $subPage->id); ?>" />      
          
      Title: <input type="text" name="title" value="<?php echo set_value('title', $subPage->title); ?>" />      
          
      Description: <textarea name="description"><?php echo set_value('description', $subPage->description); ?></textarea>      
          
      Enabled: <input type="checkbox" name="enabled" checked="<?php echo set_value('enabled',  $subPage->enabled); ?>" />      
        <a href="<?php echo site_url('subpage/read/'  . $subPage->id); ?>">Cancel</a> | 
    <button>Update</button>
  </form>
</div>