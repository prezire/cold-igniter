<div id="page_section" class="update">
    <?php 
    echo validation_errors();
    echo form_open('pagesection/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $pageSection->id); ?>" />      
          
      Name: <input type="text" name="name" value="<?php echo set_value('name', $pageSection->name); ?>" />      
        <a href="<?php echo site_url('pagesection/read/'  . $pageSection->id); ?>">Cancel</a> | 
    <button>Update</button>
  </form>
</div>