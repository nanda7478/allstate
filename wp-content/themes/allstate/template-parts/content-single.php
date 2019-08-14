<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
	 <div class="col-sm-6">
	 <?php allstate_post_thumbnail(); ?>
	  </div>
		<div class="col-sm-6">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<time class="manig-date" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?>
		<?php //allstate_entry_meta(); ?>
		
		<?php the_content(); ?>
		  </div>
		  </div>

	<header class="entry-header">
		
	</header><!-- .entry-header -->

	<?php allstate_excerpt(); ?>

	<div class="entry-content">
		<?php
			

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'allstate' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'allstate' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //allstate_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'allstate' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);

		?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
