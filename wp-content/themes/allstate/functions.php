<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'allstate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own allstate_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function allstate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/allstate
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'allstate' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'allstate' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'allstate' ),
		'social'  => __( 'Social Links Menu', 'allstate' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', allstate_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // allstate_setup
add_action( 'after_setup_theme', 'allstate_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function allstate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'allstate_content_width', 840 );
}
add_action( 'after_setup_theme', 'allstate_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function allstate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'allstate' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'allstate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'allstate' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'allstate' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'allstate_widgets_init' );

if ( ! function_exists( 'allstate_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own allstate_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function allstate_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'allstate' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'allstate' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'allstate' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function allstate_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'allstate_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function allstate_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'allstate-fonts', allstate_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'allstate-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'allstate-ie', get_template_directory_uri() . '/css/ie.css', array( 'allstate-style' ), '20160816' );
	wp_style_add_data( 'allstate-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'allstate-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'allstate-style' ), '20160816' );
	wp_style_add_data( 'allstate-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'allstate-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'allstate-style' ), '20160816' );
	wp_style_add_data( 'allstate-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'allstate-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'allstate-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'allstate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'allstate-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'allstate-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'allstate-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'allstate' ),
		'collapse' => __( 'collapse child menu', 'allstate' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'allstate_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function allstate_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'allstate_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function allstate_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function allstate_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'allstate_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function allstate_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'allstate_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function allstate_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list'; 

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'allstate_widget_tag_cloud_args' );

/*Socal ican widget */


class Social_Profile extends WP_Widget{
 
 public function __construct(){

  	parent::__construct(
          'Social_Profile',
          __('Social Profile Link', 'translation_domain'),
          array('description' => __('Links to Author social media profile', 'translation_domain'))
  		);
  }

  public function form($instance){

  	isset($instance['title'])? $title = $instance['title']: null;
  	isset($instance['facebook'])? $facebook = $instance['facebook']: null;
  	isset($instance['twitter'])? $twitter = $instance['twitter']: null;
  	isset($instance['Googleplus'])? $Googleplus = $instance['Googleplus']: null;
  	isset($instance['linkedin'])? $linkedin = $instance['linkedin']: null;

?>
    
    <p>
    	<label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title');?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('title');?>" type="text" name="<?php echo $this->get_field_name('title');?>" value="<?php echo esc_attr($title);?>">
    </p>

    <p>
    	<label for="<?php echo $this->get_field_id('facebook');?>"><?php _e('Facebook');?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('facebook');?>" type="text" name="<?php echo $this->get_field_name('facebook');?>" value="<?php echo esc_attr($facebook);?>">
    </p>

    <p>
    	<label for="<?php echo $this->get_field_id('twitter');?>"><?php _e('Twitter');?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('twitter');?>" type="text" name="<?php echo $this->get_field_name('twitter');?>" value="<?php echo esc_attr($twitter);?>">
    </p>

    <p>
    	<label for="<?php echo $this->get_field_id('Googleplus');?>"><?php _e('Googl+');?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('Googleplus');?>" type="text" name="<?php echo $this->get_field_name('Googleplus');?>" value="<?php echo esc_attr($Googleplus);?>">
    </p>

    <p>
    	<label for="<?php echo $this->get_field_id('linkedin');?>"><?php _e('Linkedin');?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('linkedin');?>" type="text" name="<?php echo $this->get_field_name('linkedin');?>" value="<?php echo esc_attr($linkedin);?>">
    </p>

<?php
  }


  public function widget($args, $instance){

    $title = apply_filters('widget_title', $instance['title']);
    $facebook = $instance['facebook'];
    $twitter = $instance['twitter'];
    $Googleplus = $instance['Googleplus'];
    $linkedin = $instance['linkedin'];

    // social profile link

    $facebook_profile = '<a href="'.$facebook.'" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
    $twitter_profile = '<a href="'.$twitter.'" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
    $Googleplus_profile = '<a href="'.$Googleplus.'" class="Googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
    $linkedin_profile = '<a href="'.$linkedin.'" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';

    echo $args['before_widget'];
	  if($title)
	  {
		  echo $args['before_title'] . $title . $args['after_widget'];
	  }

	  echo '<div class="social-icons">';
	  echo (!empty($facebook) ) ? $facebook_profile : null;
        echo (!empty($twitter) ) ? $twitter_profile : null;
        echo (!empty($Googleplus) ) ? $Googleplus_profile : null;
        echo (!empty($linkedin) ) ? $linkedin_profile : null;
	  echo '</div>';
	  
	  echo $args['after_widget'];


  }

  public function update($new_instance, $old_instance){
     $instance = $old_instance;
     $instance['title'] = $new_instance['title'];
     $instance['facebook'] = $new_instance['facebook'];
     $instance['twitter'] = $new_instance['twitter'];
     $instance['Googleplus'] = $new_instance['Googleplus'];
     $instance['linkedin'] = $new_instance['linkedin'];

     return $instance;

  }


}

function social_profile(){

 echo register_widget('Social_Profile');

}
 add_action('widgets_init', 'social_profile');

 register_sidebar( array(
		'name'          => __( 'Footer sidebar 1', 'allstate' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
  
  register_sidebar( array(
		'name'          => __( 'Footer 2', 'allstate' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

   register_sidebar( array(
    'name'          => __( 'Footer 3', 'allstate' ),
    'id'            => 'footer-3',
    'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );


   register_sidebar( array(
		'name'          => __( 'Social ican', 'allstate' ),
		'id'            => 'social-1',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
    'name'          => __( 'Top Right', 'allstate' ),
    'id'            => 'right-1',
    'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

    register_sidebar( array(
    'name'          => __( 'Footer Section', 'allstate' ),
    'id'            => 'footer-section',
    'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

    register_sidebar( array(
    'name'          => __( 'Blog Section', 'allstate' ),
    'id'            => 'blog-section',
    'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'allstate' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



/*****************Custom Post Type For Testimonial*************/

add_action('init', 'testimonial_custom_post');

function testimonial_custom_post() {

  $labels = array(
    'name' => _x('Testimonials', 'post type general name'),
    'singular_name' => _x('Testimonials', 'post type singular name'),
    'add_new' => _x('Add New', 'Testimonials'),
    'add_new_item' => __('Add New Testimonials'),
    'edit_item' => __('Edit Testimonials'),
    'new_item' => __('New Testimonials'),
    'view_item' => __('View Testimonials'),
    'search_items' => __('Search Testimonials'),
    'not_found' =>  __('No Testimonials found'),
    'not_found_in_trash' => __('No Testimonials found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Testimonials'
 
  );
   
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  );
  // The following is the main step where we register the post.
  register_post_type('testimonials',$args);
   
  // Initialize New Taxonomy Labels
  $labels = array(
    'name' => _x( 'Testimonials Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => __( 'Parent Tag' ),
    'parent_item_colon' => __( 'Parent Tag:' ),
    'edit_item' => __( 'Edit Tags' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
  );
    // Custom taxonomy for Project Tags
    register_taxonomy('testimonial_category',array('testimonials'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'testimonial-category' ),
  ));
   

}



/*****************Investigation Articles Post Type For Testimonial*************/

add_action('init', 'articles_custom_post');

function articles_custom_post() {

  $labels = array(
    'name' => _x('Articles', 'post type general name'),
    'singular_name' => _x('Articles', 'post type singular name'),
    'add_new' => _x('Add New', 'Articles'),
    'add_new_item' => __('Add New Articles'),
    'edit_item' => __('Edit Articles'),
    'new_item' => __('New Articles'),
    'view_item' => __('View Articles'),
    'search_items' => __('Search Articles'),
    'not_found' =>  __('No Articles found'),
    'not_found_in_trash' => __('No Articles found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Articles'
 
  );
   
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  );
  // The following is the main step where we register the post.
  register_post_type('articles',$args);
   
  // Initialize New Taxonomy Labels
  $labels = array(
    'name' => _x( 'Articles Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => __( 'Parent Tag' ),
    'parent_item_colon' => __( 'Parent Tag:' ),
    'edit_item' => __( 'Edit Tags' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
  );
    // Custom taxonomy for Project Tags
    register_taxonomy('articles_category',array('articles'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'articles-category' ),
  ));
   

}


/*****************Case Studies Post Type For Testimonial*************/

add_action('init', 'studies_custom_post');

function studies_custom_post() {

  $labels = array(
    'name' => _x('Case Study', 'post type general name'),
    'singular_name' => _x('Case Study', 'post type singular name'),
    'add_new' => _x('Add New', 'Case Study'),
    'add_new_item' => __('Add New Case Study'),
    'edit_item' => __('Edit Case Study'),
    'new_item' => __('New Case Study'),
    'view_item' => __('View Case Study'),
    'search_items' => __('Search Case Study'),
    'not_found' =>  __('No Case Study found'),
    'not_found_in_trash' => __('No Case Study found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Case Study'
 
  );
   
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  );
  // The following is the main step where we register the post.
  register_post_type('case-study',$args);
   
  // Initialize New Taxonomy Labels
  $labels = array(
    'name' => _x( 'Case Study Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => __( 'Parent Tag' ),
    'parent_item_colon' => __( 'Parent Tag:' ),
    'edit_item' => __( 'Edit Tags' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
  );
    // Custom taxonomy for Project Tags
    register_taxonomy('study_category',array('case-study'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'study-category' ),
  ));
   

}


