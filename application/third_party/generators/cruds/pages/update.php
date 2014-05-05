<div id="page" class="update">
    <?php 
    echo validation_errors();
    echo form_open('page/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $page->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $page->name); ?>" />      
        <a href="<?php echo site_url('page/read/'  . $page->id); ?>">Cancel</a> | 
    <button>Update</button>
  </form>
</div>