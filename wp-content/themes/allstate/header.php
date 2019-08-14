<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
        <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/flexslider.css" type="text/css">
        <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo site_url();?>/wp-content/themes/allstate/custom.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
        <?php wp_head(); ?>
        </head>
        
        <body <?php body_class(); ?>>
<div id="mobileMenuContainer" class="anon-menu">
          <div id="mobileMenuOverlay"></div>
          <div id="site-navigation">
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
    <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
              <?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
            </nav>
    <!-- .main-navigation -->
    <?php endif; ?>
    <?php if ( has_nav_menu( 'social' ) ) : ?>
    <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
              <?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>',
									) );
								?>
            </nav>
    <!-- .social-navigation -->
    <?php endif; ?>
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    <?php dynamic_sidebar( 'social-1' );  ?>
  </div>
        </div>
<div id="page" class="site">
<header id="masthead" class="site-header" role="banner">
          <div class="site-header-main">
    <div class="bg_menu">
              <div class="container">
        <div class="row">
                  <div class="col-sm-3">
            <div class="site-branding">
                      <?php allstate_the_custom_logo(); ?>
                      <?php if ( is_front_page() && is_home() ) : ?>
                      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                        </a></h1>
                      <?php else : ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                        </a></p>
                      <?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
                      <p class="site-description"><?php echo $description; ?></p>
                      <?php endif; ?>
                    </div>
            <!-- .site-branding --> 
          </div>
                  <div class="col-sm-9">
            <div class="right-header">
                      <div class="top-text-right">
                <?php dynamic_sidebar( 'right-1' );  ?>
              </div>
                      <a id="menu-toggle1" class="menu-toggle"> <img class="fa-bars" src="<?php echo site_url(); ?>/wp-content/themes/allstate/images/berger.png" /> <img class="fa-times" src="<?php echo site_url(); ?>/wp-content/themes/allstate/images/close.png" /> </a>
                      <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
                      <button id="menu-toggle" class="menu-toggle">
              <?php _e( 'Menu', 'allstate' ); ?>
              </button>
                      <div class="top_header_menu">
                <div id="site-header-menu" class="site-header-menu">
                          <?php //dynamic_sidebar( 'right-1' );  ?>
                          <?php //dynamic_sidebar( 'social-1' );  ?>
                          <?php if ( has_nav_menu( 'primary' ) ) : ?>
                          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'allstate' ); ?>">
                    <?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
                  </nav>
                          <!-- .main-navigation -->
                          <?php endif; ?>
                          <?php if ( has_nav_menu( 'social' ) ) : ?>
                          <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'allstate' ); ?>">
                    <?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>',
									) );
								?>
                  </nav>
                          <!-- .social-navigation -->
                          <?php endif; ?>
                          <!-- <div class="header-menu-manige"><?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?></div> --> 
                        </div>
                <!-- .site-header-menu -->
                <?php endif; ?>
                <div class="header_social">
                          <?php dynamic_sidebar( 'social-1' );  ?>
                        </div>
              </div>
                      <div class="header-menu-manige">
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
              </div>
                    </div>
          </div>
                </div>
      </div>
            </div>
  </div>
          <!-- .site-header-main -->
          
          <?php if ( get_header_image() ) : ?>
          <?php
					/**
					 * Filter the default allstate custom header sizes attribute.
					 *
					 * @since Twenty Sixteen 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'allstate_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
          <div class="header-image"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"> </a> </div>
          <!-- .header-image -->
          <?php endif; // End header image check. ?>
        </header>
<!-- .site-header --> 

<script> 
		jQuery(document).ready(function($) {
			$("#menu-toggle1").click(function(){
			 
			$(".hamburger-menu").toggleClass("open");	
			$("#mobileMenuContainer").toggleClass("open-nav");
			$("body").toggleClass("semgeeks");
		 	
		});
		
		});
		</script> 