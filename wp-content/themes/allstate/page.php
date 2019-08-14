<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
  <?php $image = get_field('banner_image'); ?>
<div class="inner-pages-banner" style="background-image:url(<?php echo $image['url'];?>);">
 <div class="container inner-pages-content-table">
 <div id="post-<?php the_ID(); ?>" class="inner-pages-content-table-cell text-left">
 <h1 class="entry-title">
<?php the_title(); ?>
 </h1> 
</div>
</div>
</div>
<?php endwhile;?>


<div class="container">
<div class="row">
<?php while ( have_posts() ) : the_post(); ?>
  <div class="col-sm-12">
  <?php the_content();?>
  </div>
	<?php endwhile;?>
</div>
</div>


<?php get_footer(); ?>
