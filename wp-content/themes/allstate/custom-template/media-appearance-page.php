<?php

/*
 Display Template Name: Media Appearance Page
*/

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php $image = get_field('background_image'); ?>
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

<div class="media_apperance_page">
<div class="container">
<div class="media_page">

<?php the_field('media_content');?>





<div class="bottom_tab_media">

	<?php the_field('media_faqs');?>
</div>
	
</div>



</div>


<?php
get_footer();
?>