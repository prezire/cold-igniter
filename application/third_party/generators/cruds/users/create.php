<div id="user" class="create">
    <?php 
    echo validation_errors();
    echo form_open('user/create'); 
    ?>          
      Id: <input type="text" name="id" />      
          
      Full Name: <input type="text" name="full_name" />      
          
      Title: <input type="checkbox" name="title" />      
          
      Address: <textarea name="address"></textarea>      
          
      Postal Code: <input type="text" name="postal_code" />      
          
      Email: <input type="text" name="email" />      
          
      Mobile: <input type="text" name="mobile" />      
          
      Ic Number: <input type="text" name="ic_number" />      
          
      :       
          
      Website: <input type="text" name="website" />      
          
      Facebook: <input type="text" name="facebook" />      
          
      Biography: <textarea name="biography"></textarea>      
        <a href="<?php echo site_url('user'); ?>">Cancel</a> | 
    <button>Create</button>
  </form>
</div>