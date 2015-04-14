
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

    <title>
      <?php wp_title( '|', true, 'right'); ?>
      <?php bloginfo('name');?>
    </title>

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

    <!-- TOP-NAV -->
    <div class="container-fluid main-container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-default">

            <ul class="nav navbar-nav navbar-right user-status">
                <li class="hidden-xs">
                    <a href="#"><img src="<?php bloginfo('template_directory');?>/images/social/FB.png" alt="Facebook Icon"></a>
                </li>
                <li class="hidden-xs">
                    <a href="#"><img src="<?php bloginfo('template_directory');?>/images/social/NV.png" alt="Naver Icon"></a>
                </li>
                <li class="hidden-xs">
                    <a href="#"><img src="<?php bloginfo('template_directory');?>/images/social/KK.png" alt="Kakao Icon"></a>
                </li>
                <li>
                    <?php
                    if (is_user_logged_in()) {
                    $user = wp_get_current_user();
                    echo wp_loginout();
                    } else { ?>
                    <strong><?php wp_loginout(); ?></strong>
                    <?php } ?>
                </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <!-- MAIN-NAV -->
    <div class="container main-container">
      <a class="visible-xs text-center" href="<?php echo home_url(); ?>">
            <img src="<?php bloginfo('template_directory');?>/images/etlogo.png" alt="ET Logo 2">
          </a>
      <nav class="navbar navbar-inverse" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle nav-button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="hidden-xs" href="<?php echo home_url(); ?>">
            <img src="<?php bloginfo('template_directory');?>/images/et-logo.png" alt="ET Logo">
          </a>
      </div>
  
          <?php
              wp_nav_menu( array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse',
                  'container_id'      => 'bs-example-navbar-collapse-1',
                  'menu_class'        => 'nav navbar-nav navbar-right main-menu',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
          ?>
    </div>
</nav>







