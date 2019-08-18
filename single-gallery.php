<?php

get_header();
?>
<section class="singleGallery">
<div class="container">
    <div class="row singleGallery__header">
        <h1>Podgląd obrazka</h2>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 singleGallery__content">
            <?php
             $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

            ?>
            
           <figure class="polaroidGallery__container--preview">
           <a class="pop" href="<?php echo $image[0]; ?>" data-footer="<?php echo (get_field('image_label'));?>" data-toggle="lightbox" data-gallery="example-gallery" >

            <div class="polaroidGallery__photo"><img class="polaroidGallery__img" src="<?php echo $image[0]?>" alt="Happy Moment"></div>
            </a> 
            <figcaption class="polaroidGallery__caption">
              <h4 class="polaroidGallery__text"><?php echo (get_field('image_label')); ?></h4>
            </figcaption>
          </figure>
        </div>
    </div>
</div>
</section>

<?php
get_footer();
