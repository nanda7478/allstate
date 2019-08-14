<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div class="container">     
<div class="blog-page">  
		  <div class="row">	
<div class="col-lg-9 col-md-12 event-left">
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
		 echo '<img class="img-responsive flsd"  src="' . esc_url( $large_image_url[0] ) . '" />';
        
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

  <div class="col-lg-3 col-md-12 event-right"> <?php get_sidebar(); ?></div>
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
