<div id="sub_page" class="create">
    <?php echo form_open('subpage/create'); ?>          
      Id: <input type="text" name="id" />      
          
      Title: <input type="text" name="title" />      
          
      Description: <textarea name="description"></textarea>      
          
      Enabled: <input type="checkbox" name="enabled" />      
        <a href="<?php echo site_url('subpage'); ?>">Cancel</a> | 
    <button>Create</button>
  </form>
</div>