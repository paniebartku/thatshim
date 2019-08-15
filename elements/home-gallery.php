<section class="polaroidGallery" id="polaroidGallery">

<div class="container">



<div class="row" style="justify-content: center">
<?php $loop = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => -1));
        if ( $loop->have_posts() ) :
            while ( $loop->have_posts() ) : $loop->the_post(); 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
            
            ?>
        
   
           <figure class="polaroidGallery__container">
           <a class="pop" href="<?php echo $image[0]; ?>" data-footer="<?php echo "elo";?>" data-toggle="lightbox" data-gallery="example-gallery" >

            <div class="polaroidGallery__photo"><img class="polaroidGallery__img" src="<?php echo $image[0]?>" alt="Happy Moment"></div>
            </a> 
            <figcaption class="polaroidGallery__caption">
              <h3 class="polaroidGallery__text">Happy Moment</h3>
            </figcaption>
          </figure>


        <?php endwhile; 
       endif;
   wp_reset_postdata();
   ?>

</div>


</div>

<style>
.polaroidGallery__photo::before {
  content: "Ver fotos";
}
</style>

    </section>