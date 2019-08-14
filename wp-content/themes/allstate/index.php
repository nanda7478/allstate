<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>


   <?php $image = get_field('banner_header_image', get_option('page_for_posts')); ?>
<div class="inner-pages-banner" style="background-image:url(<?php echo site_url();?>/wp-content/uploads/2018/03/banner-2.jpg);">
 <div class="container inner-pages-content-table">
 <div id="post-<?php the_ID(); ?>" class="inner-pages-content-table-cell text-left">
 <h1 class="entry-title">
Blog
 </h1>  
</div>
</div>
</div>


	<div class="container">     
<div class="blog-page">  
		  <div class="row">	
<div class="col-md-9 event-left">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

			?>
            
            <div class="event-image-content">
			<div class="event-img">

			<?php
			if ( has_post_thumbnail() ) {
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    if ( ! empty( $large_image_url[0] ) ) {
       
       // echo get_the_post_thumbnail( $post->ID, 'full' ); 
    	?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php	 echo '<img class="img-responsive flsd"  src="' . esc_url( $large_image_url[0] ) . '" />'; ?>
	</a>
  <?php 

    }
}
?>
			
			<?php //twentysixteen_post_thumbnail(); ?>
				
			</div>
			<div class="event-content">
            <header class="entry-header">
			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
			</header>

			<div class="author_date">
          
       
             <?php /*?><?php the_author();?><?php */?>
          
          
            <span> <?php echo get_the_date('M j, Y'); ?></span>
          	</div>
			<!--<div class="post_category_name"><?php /*?><?php the_category() ?><?php */?></div>
			-->	
				<div class="entry-content">
			<?php $content = get_the_content();
            $trimmed_content = wp_trim_words( $content, 50, '...<a href="'. get_permalink() .'"><br>read more </a>' ); ?>
              <p><?php echo $trimmed_content; ?></p>
				</div>
			</div>
			</div>
              <?php
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			
	?>


        </div>

  <div class="col-md-3 event-right"> <?php get_sidebar(); ?></div>
</div>


<?php
// Previous/next page navigation.
			// the_posts_pagination( array(
			// 	'prev_text'          => __( 'Previous page', 'twentysixteen' ),
			// 	'next_text'          => __( 'Next page', 'twentysixteen' ),
			// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			// ) );

		// If no content, include the "No posts found" template.
?>
<div class="nav-links">
<?php
		echo paginate_links( array(
			'type'      => 'post',
			'prev_text' => '<img src="'.site_url().'/wp-content/uploads/2018/04/nav_left.png">',
			'next_text' => '<img src="'.site_url().'/wp-content/uploads/2018/04/nav_right.png">',
		) );
		?>
		</div>

	</div>

	</div>
<?php get_footer(); ?>
