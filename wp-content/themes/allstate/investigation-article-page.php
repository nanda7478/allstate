<?php

/*
 Display Template Name: Investigation Aricles Page
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


<div class="container">
<div class="investigaion-article-page">
<div class="row">

<?php
$args = array('post_type'=>'articles','posts_per_page'=>-1);
$query = new WP_Query($args);
    if($query->have_posts()):
    while( $query->have_posts() ): $query->the_post();
?>

 <div class="col-sm-3 investigation-box">
 <div class="investigation-title">
<div class="investion_title_h3"> <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3></div>
 </div>
 </div>

<?php endwhile; ?>
   
   <?php endif; ?>

</div>

</div>
</div>



<?php
 get_footer();
?>