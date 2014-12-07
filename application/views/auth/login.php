<div id="auth" class="login">
  <?php
   echo validation_errors();
   echo form_open('auth/login'); 
  ?>
  	<a class="btnFb" permissions="public_profile,email,user_location,user_birthday">FB Login</a>
    
    Username: <input type="text" name="username" />
    Password: <input type="password" name="password" />
    
    <button>Login</button>
    <div>
    	<a href="<?php echo site_url('auth/create'); ?>">Register</a> |
    	<a href="<?php echo site_url('auth/forgotPassword'); ?>">Forgot Password</a>
    </div>
  </form>
</div>