<div id="user" class="create row">
  <h4></h4>
  <?php
    echo validation_errors();
    echo form_open('user/create');
  ?>
  
  Full Name: <input type="text" name="full_name" />
  
  Title: <?php echo form_dropdown('title', $titles); ?>
  
  Email: <input type="text" name="email" />
  
  Password: <input type="text" name="password" />
  
  Date Of Birth: <input type="text" name="date_of_birth" />
  
  Address: <input type="text" name="address" />
  
  Country: <input type="text" name="country" />
  
  Landline: <input type="text" name="landline" />
  
  Mobile: <input type="text" name="mobile" />
  
  Enabled: <input type="checkbox" name="enabled" />
  
  <div>
    <a href="<?php echo site_url('user'); ?>" class="button tiny alert">Cancel</a>
    <button class="button tiny">Create</button>
  </div>
</form>
</div>