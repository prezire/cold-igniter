<div id="user" class="update">
    <?php 
    echo validation_errors();
    echo form_open('user/update'); ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $user->id); ?>" />      
          
      Username: <input type="text" name="username" value="<?php echo set_value('username', $user->username); ?>" />      
        <a href="<?php echo site_url('user/read/'  . $user->id); ?>">Cancel</a> | 
    <button>Update</button>
  </form>
</div>