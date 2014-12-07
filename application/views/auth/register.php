<div id="auth" class="register">
  <?php
   echo echo validation_errors();
   echo site_url('auth/create'); 
  ?>
    Username: <input type="text" name="username" />
    Password: <input type="password" name="password" />
    <button>Register</button> | 
    <a href="#">Login</a>
  </form>
</div>