<div id="page_section" class="create">
    <?php 
    echo validation_errors();
    echo form_open('pagesection/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
        <a href="<?php echo site_url('pagesection'); ?>">Cancel</a> | 
    <button>Create</button>
  </form>
</div>