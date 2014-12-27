<div id="auth" class="login row">
  <div data-alert class="alert-box hide radius alert">
    <?php echo validation_errors(); ?>
    <a href="#" class="close">&times;</a>
  </div>
  <?php if(isset($error)){?>
    <script>
      $('.alert-box').removeClass('hide');
    </script>
  <?php } ?>
  <?php echo form_open('auth/login'); ?>

    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a class="btnFb" 
            permissions="public_profile,email,user_location,user_birthday">
          <img src="<?php echo base_url('public/images/fb_login.png'); ?>" />
        </a>
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        Email: <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        Password: <input type="password" name="password" />
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <button class="tiny radius">Login</button>
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a href="<?php echo site_url('auth/create'); ?>">Register</a> |
        <a href="<?php echo site_url('auth/forgotPassword'); ?>">Forgot Password</a>
      </div>
    </div>
  </form>
</div>