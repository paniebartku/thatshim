<section class="polaroidGallery" id="polaroidGallery">

<div class="container">



<div class="row">
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
<!-- 
          <figure class="vintalight__container">
            <div class="vintalight__photo"><img class="vintalight__img" src="https://images.pexels.com/photos/69969/pexels-photo-69969.jpeg?w=1260&amp;h=750&amp;auto=compress&amp;cs=tinysrgb" alt="Happy Moment"></div>
            <figcaption class="vintalight__caption">
              <h3 class="vintalight__text">Happy Moment</h3>
            </figcaption>
          </figure>
          <figure class="vintalight__container">
            <div class="vintalight__photo"><img class="vintalight__img" src="https://images.pexels.com/photos/247929/pexels-photo-247929.jpeg?h=350&amp;auto=compress&amp;cs=tinysrgb" alt="Happy Moment"></div>
            <figcaption class="vintalight__caption">
              <h3 class="vintalight__text">Happy Moment</h3>
            </figcaption>
          </figure>
          <figure class="vintalight__container">
            <div class="vintalight__photo"><img class="vintalight__img" src="https://images.pexels.com/photos/92866/pexels-photo-92866.jpeg?h=350&amp;auto=compress&amp;cs=tinysrgb" alt="Happy Moment"></div>
            <figcaption class="vintalight__caption">
              <h3 class="vintalight__text">Happy Moment</h3>
            </figcaption>
          </figure>
          <figure class="vintalight__container">
            <div class="vintalight__photo"><img class="vintalight__img" src="https://images.pexels.com/photos/331986/pexels-photo-331986.jpeg?h=350&amp;auto=compress&amp;cs=tinysrgb" alt="Happy Moment"></div>
            <figcaption class="vintalight__caption">
              <h3 class="vintalight__text">Happy Moment</h3>
            </figcaption>
          </figure>
          <figure class="vintalight__container">
            <div class="vintalight__photo"><img class="vintalight__img" src="https://images.pexels.com/photos/296649/pexels-photo-296649.jpeg?h=350&amp;auto=compress&amp;cs=tinysrgb" alt="Happy Moment"></div>
            <figcaption class="vintalight__caption">
              <h3 class="vintalight__text">Happy Moment</h3>
            </figcaption>
          </figure>
          <figure class="vintalight__container">
            <div class="vintalight__photo"><img class="vintalight__img" src="https://images.pexels.com/photos/219776/pexels-photo-219776.jpeg?h=350&amp;auto=compress&amp;cs=tinysrgb" alt="Happy Moment"></div>
            <figcaption class="vintalight__caption">
              <h3 class="vintalight__text">Happy Moment</h3>
            </figcaption>
          </figure>
		  <figure class="vintalight__container">
            <div class="vintalight__photo"><img class="vintalight__img" src="https://images.pexels.com/photos/92866/pexels-photo-92866.jpeg?h=350&amp;auto=compress&amp;cs=tinysrgb" alt="Happy Moment"></div>
            <figcaption class="vintalight__caption">
              <h3 class="vintalight__text">Happy Moment</h3>
            </figcaption>
          </figure>
		        <figure class="vintalight__container">
            <div class="vintalight__photo"><img class="vintalight__img" src="https://images.pexels.com/photos/296649/pexels-photo-296649.jpeg?h=350&amp;auto=compress&amp;cs=tinysrgb" alt="Happy Moment"></div>
            <figcaption class="vintalight__caption">
              <h3 class="vintalight__text">Happy Moment</h3>
            </figcaption>
          </figure> -->
    </section>