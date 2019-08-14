<?php
/*
*
Template Name: Resources Custom
*/
get_header();

?>
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
 
<div class="resource_page">
<div class="container">
<div class="resource_content max-width-page">
<div class="row">
<div class="manig-accord">
 <?php echo $accordions = get_field('accordions_shortcode'); ?>
 </div>
</div>
</div></div></div>


<?php get_footer(); ?>