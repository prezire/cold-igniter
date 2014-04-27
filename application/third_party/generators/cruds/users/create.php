<div id="user" class="create">
    <?php 
    echo validation_errors();
    echo form_open('user/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Username: <input type="text" name="username" />      
        <a href="<?php echo site_url('user'); ?>">Cancel</a> | 
    <button>Create</button>
  </form>
</div>