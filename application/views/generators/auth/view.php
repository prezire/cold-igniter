<div id="auth" class="login">
  <?php
   echo echo validation_errors();
   echo site_url('user/login'); 
  ?>
    Username: <input type="text" name="username" />
    Password: <input type="password" name="password" />
    <button>Login</button>
  </form>
</div>