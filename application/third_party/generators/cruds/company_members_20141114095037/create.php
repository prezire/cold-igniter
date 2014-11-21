<div id="company_member" class="create row">
  <h4></h4>
    <?php 
    echo validation_errors();
    echo form_open('companymember/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Company Id: <input type="text" name="company_id" />      
          
      Editor Id: <input type="text" name="editor_id" />      
        <a href="<?php echo site_url('companymember'); ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>