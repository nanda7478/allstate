<?php
/*
*
Template Name: Custom Home 
*/
get_header();

?>

<div class="row home-slider">
<div id="primary" class="col-md-12 mb-xs-24 <?php echo esc_attr( $layout_class ); ?>">
<div id="slider" class="flexslider">

  <ul class="slides">

<?php
while( have_rows('home_slider') ): the_row();            
$image = get_sub_field( 'image' );
?>
    <li style="background-image: url(<?php echo $image['url']; ?>); ">
    <div class="container carousel-caption-table">
    <div class="carousel-caption-table-cell text-left">  
      <h1><?php the_sub_field('title');?></h1>
      <div class="button"><a href="<?php the_sub_field('button_url');?>"><?php the_sub_field('button_title');?></a>
      </div>

      </div>
      </div>
    </li>
    <?php  endwhile; ?>
  </ul>
	
</div>
</div>
</div>
<div class="home_content">
<div class="row">
<?php 
    
if( have_rows('section_starts') ):

    while( have_rows('section_starts') ) : the_row();
        
 ?>
<div class="col-sm-5 home_left">
  <h4><?php the_sub_field('section_first');?></h4>
</div>
<?php
endwhile;
endif;
?>
<?php 
    
if( have_rows('section_starts') ):

    while( have_rows('section_starts') ) : the_row();
?>
<div class="col-sm-7 home-right">

<?php the_sub_field('section_second');?>
</div>
<?php
    endwhile;

endif;

?>

</div>	
</div>	

<div class="container curve_container">
<div class="cuurve_section">
<div class="row">
<div class="col-sm-10 col-xs-9 curve_padd">
<div class="left_tought min-height">
<?php 
 the_field('investigator_text');
?>
</div>
</div>
<div class="col-sm-2 col-xs-3">
<div class="right_arr min-height">
<div class="angle-right-arrow"><a href="<?php  echo site_url();?>/testimonial/"><img src="http://demosrvr.com/wp/allstate/wp-content/uploads/2018/04/right_arrow.png" alt="" /></a></div>
</div>

</div>

</div>
</div>
</div>
<div class="investigation">
<div class="container">
<div class="investi_boxes">
<div class="row">
<?php
while( have_rows('services__section') ): the_row();            
$image = get_sub_field( 'services_image');

?>
<div class="col-lg-3">
<div class="manage-box">
<div class="manage-box-image">
 <img style="background-image" src="<?php echo $image['url']; ?>" />
 </div>
 <div class="menige-service">
 <?php echo $service_content = get_sub_field( 'service_content'); ?>
 </div>
</div>
</div>
<?php  endwhile; ?>
</div>
</div>

</div>
</div>

<div class="img_box">
<div class="row">
  <div class="col-sm-6">
  <div class="img_box_left max_height">
  <?php 
      while( have_rows('image_and__content') ): the_row();            
      $images = get_sub_field( 'image_section' );   
  ?>
  <a href="#"><img src="<?php echo $images['url']; ?>" /></a>
  <?php  endwhile; ?>
  </div>  </div>

      <div class="col-sm-6 left-no-padding">
       <div class="img_box_right max_height">
      <?php       
      if( have_rows('image_and__content') ):

          while( have_rows('image_and__content') ) : the_row();
              
             echo $valuefirst = get_sub_field('textarea');

          endwhile;
      endif;
      ?>
      </div></div>

    </div></div>

<div class="unusaul_bg">
<div class="container">
  <div class="row">
  <div class="col-sm-10">
  <div class="specal"> 
  <h2><?php the_field('specialised');?></h2>
  </div>
  </div>

   <div class="col-sm-2 right_learn_more">
   <a href="<?php  echo site_url();?>/difficult-cases/">Learn More ></a>
   </div>

  </div>
    </div>

  </div>
    
   
<div class="container">
<div class="logo_sectn">
<h3> <?php  echo  get_post_meta(get_the_ID(),'recognized_text',true);?></h3>
<ul class="logos_ul">

<?php
    while( have_rows('logo_image') ): the_row();            
    $image = get_sub_field( 'logo1' );
 ?>
<li>
<a href="<?php the_sub_field('logo_image');?>"><img src="<?php echo $image['url']; ?>" /></a>
</li>
<?php  endwhile; ?>
 <div class="button"><a href="<?php  echo site_url();?>/media-appearances/">SEE MORE APPEARANCES</a></div> 
</ul></div>
</div>
<div class="container">
<div class="last_box">
<div class="row">

<div class="col-sm-9 left_last">
  <?php 
  while( have_rows('featured_image_section') ): the_row();            
  $imagefirst = get_sub_field( 'first_image' );   
  ?>
 <div class="img_content min"> <div class="img_trans"><a href="#"><img src="<?php echo $imagefirst['url']; ?>" /></a></div>
  <?php  endwhile; ?>
  <div class="menige-featurd-text">
			<h2>SIGNS OF A</h2>
			<h2>CHEATING</h2>
			<h2>SPOUSE</h2>
	<div class="button"><a href="<?php  echo site_url();?>/case-studies/">READ MORE</a></div> 
  </div>
</div></div>

<div class="col-sm-3 right_last">
  <?php 
  while( have_rows('featured_image_section') ): the_row();            
  $imagesecond = get_sub_field( 'second_image' );   
  ?>
 <div class="img_righ_content"> <div class="img_trans"><a href="#"><img src="<?php echo $imagesecond['url']; ?>" /></a></div>
  <?php  endwhile; ?>
<div class="righ_content_img">
<p> Whether you need a<br /> trusted therapist,<br />
lawyer, and<br />
financial advisor</p>
<div class="right_button"><a href="https://cuppls.com/">FREE 15-MINUTE<br />
CONSULTATION</a></div> 
</div>
</div>
  </div></div>
 
 </div>

<?php get_footer(); ?>