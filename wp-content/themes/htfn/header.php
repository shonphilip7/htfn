<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="background-color:#000000 !important;">
      <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
	    <?php
		  $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          if( has_custom_logo() ){
              echo '<img src="'. esc_url( $logo[0] ) .'">';
          }else{
              echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
          }
		  ?>
	  </a>
	  <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsmain" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

		<?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbarsmain',
            'menu_class'        => 'navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker()
		) );
        ?>
		<div class="my-2 my-lg-0">
		  <div id="social" class="col-sm-12">
		    <a href="" class="so-icons col-sm-4"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2018/02/e0678ef25486466ba65ef6ad47b559e1.png" /></a>
		    <a href="" class="so-icons col-sm-4"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2018/02/c4392d634a0148fda8b7b2b0ad98293b.png" /></a>
            <a href="" class="so-icons col-sm-4"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2018/02/f61c7a3b4b4947b28511a25034973383.png" /></a>
			<div id="log-in-block">
			  <?php if(is_user_logged_in()){ ?>
			  <a href="<?php echo wp_logout_url(); ?>">Logout</a>
			  <?php }else{?>
		      <a href="<?php echo get_home_url(); ?>/member-login/">Member Login</a>
			  <?php }?>
		    </div>
		  </div>
        </div>
	  </div>
    </nav>
    </header>	
