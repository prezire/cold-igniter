<div id="page" class="create">
    <?php 
    echo validation_errors();
    echo form_open('page/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Name: <input type="text" name="name" />      
        <a href="<?php echo site_url('page'); ?>">Cancel</a> | 
    <button>Create</button>
  </form>
</div>