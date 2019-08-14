<?php

/*
  Display Template Name: Testimonial Page
*/


get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php $image = get_field('header_banner_image'); ?>
<div class="inner-pages-banner" style="background-image:url(<?php echo $image['url'];?>);">
 <div class="container inner-pages-content-table">
 <div id="post-<?php the_ID(); ?>" class="inner-pages-content-table-cell text-left">
 <h1 class="entry-title">
<?php the_title(); ?>
 </h1>
 <p>
<?php the_content();?>
</p>   
</div>
</div>
</div>
<?php endwhile;?>
<div class="top-bg-matter">
<div class="blck_bg">
</div>
<div class="blue_rotate_div">
<div class="container">
<h2>DEAR ASI...</h2>

</div>
</div>
<div class="container">
<div class="border_div"></div>
</div></div>


<div class="container">
<div class="testimonial-matter">

<?php
$args = array('post_type'=>'testimonials','posts_per_page'=>-1, 'order' => 'ASC');
$query = new WP_Query($args);
    if($query->have_posts()):
    while( $query->have_posts() ): $query->the_post();
?>

 <div class="testmonial_block">
 <?php the_content();?>
 <div class="destination">
 <h5><?php the_title();?></h5>
 <h5><?php the_field('destination');?></h5></div>
 </div>

<?php endwhile; ?>
   
   <?php endif; ?>

</div>

</div>

<?php
 get_footer();
?>