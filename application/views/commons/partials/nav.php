<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <a class="logo" href="<?php echo site_url(); ?>">
        <img src="<?php echo base_url('public/images/logo.png'); ?>" />
      </a>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span><!--Menu--></span></a></li>
  </ul>

  <?php $u = getLoggedUser(); ?>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
      <?php if(isLoggedIn()){ ?>
        <li><a href="<?php echo site_url('gallery'); ?>">Gallery</a></li>
        <li><a href="<?php echo site_url('search'); ?>">Search</a></li>

        <li class="has-dropdown">
          <a href="#">Content</a>
          <ul class="dropdown">
            <li>
              <a href="<?php echo site_url('file'); ?>">
                Files
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('comment'); ?>">
                Comments
              </a>
            </li>
          </ul>
        </li>

        <li class="has-dropdown">
          <a href="#">Auth</a>
          <ul class="dropdown">
            <?php if(hasPrivilege('User')){ ?>
            <li>
              <a href="<?php echo site_url('user'); ?>">
                Users
              </a>
            </li>
            <?php } ?>
            <li>
              <a href="<?php echo site_url('role'); ?>">
                Roles
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('privilege'); ?>">
                Privileges
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('permission'); ?>">
                Permissions
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('permission/userPermissions'); ?>">
                User Permissions
              </a>
            </li>

            <li>
              <a href="<?php echo site_url('user/update/' . $u->id); ?>">
                Profile
              </a>

              <?php 
                  $bSuperAdmin = getRoleName() == 'Super Administrator' && !getHasOriginalUser();
                  if($bSuperAdmin)
                  {
                ?>
                  <div id="loginAs" class="reveal-modal" data-reveal>
                    <h5>Log In As...</h5>
                    <input type="email" name="email" placeholder="Email*" />
                    <input type="password" name="password" placeholder="Password*" />
                    <button class="tiny">Login</button>
                    <a class="close-reveal-modal">&#215;</a>
                  </div>
                <?php } ?>

                <?php if($bSuperAdmin){ ?> 
                  <a href="#" data-reveal-id="loginAs">(Login As...)</a>
                <?php } ?>

                <?php if(getHasOriginalUser()){ ?>
                <a href="<?php echo site_url('auth/logoutAs'); ?>">
                  (Logout As...)
                </a>
                <?php } ?>

            </li>
            <li>
              <a href="<?php echo site_url('auth/logout'); ?>">
                Logout (<?php echo $u->full_name; ?>)
              </a>
            </li>

          </ul>
        </li>

        <li><a href="<?php echo site_url('analytics'); ?>">Analytics</a></li>
        <li><a href="<?php echo site_url('payment'); ?>">Payments</a></li>

      <?php } else{ ?>
        <li>
          <a href="<?php echo site_url('auth/login'); ?>">
            Login
          </a>
        </li>
      <?php } ?>
      <li class="has-dropdown">
        <a href="#">Help</a>
        <ul class="dropdown">
          <li><a href="http://www.simplifie.net/about" target="_blank">About</a></li>
          <li><a href="<?php echo base_url('user_guide'); ?>" target="_blank">User Guide</a></li>
          <li><a href="#" target="_blank">Cheat Sheet</a></li>
        </ul>
      </li>
    </ul>

    <!-- Left Nav Section
    <ul class="left">
      <li><a href="#">Left Nav Button</a></li>
    </ul> -->
  </section>
</nav>