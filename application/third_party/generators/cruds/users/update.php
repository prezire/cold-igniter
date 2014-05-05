<div id="user" class="update">
    <?php 
    echo validation_errors();
    echo form_open('user/update'); 
    ?>          
      Id: <input type="text" name="id" value="<?php echo set_value('id', $user->id); ?>" />      
          
      Full Name: <input type="text" name="full_name" value="<?php echo set_value('full_name', $user->full_name); ?>" />      
          
      Title: <input type="checkbox" name="title" checked="<?php echo set_value('title',  $user->title); ?>" />      
          
      Address: <textarea name="address"><?php echo set_value('address', $user->address); ?></textarea>      
          
      Postal Code: <input type="text" name="postal_code" value="<?php echo set_value('postal_code', $user->postal_code); ?>" />      
          
      Email: <input type="text" name="email" value="<?php echo set_value('email', $user->email); ?>" />      
          
      Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile); ?>" />      
          
      Ic Number: <input type="text" name="ic_number" value="<?php echo set_value('ic_number', $user->ic_number); ?>" />      
          
      Date Of Birth: <input type="text" name="date_of_birth" value="<?php echo set_value('date_of_birth', $user->date_of_birth); ?>" />      
          
      Website: <input type="text" name="website" value="<?php echo set_value('website', $user->website); ?>" />      
          
      Facebook: <input type="text" name="facebook" value="<?php echo set_value('facebook', $user->facebook); ?>" />      
          
      Biography: <textarea name="biography"><?php echo set_value('biography', $user->biography); ?></textarea>      
        <a href="<?php echo site_url('user/read/'  . $user->id); ?>">Cancel</a> | 
    <button>Update</button>
  </form>
</div>