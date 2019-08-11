
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Hello</h2>
        </div>
    </div>
    





<div class="my-gallery">
<div class="row">
<?php $loop = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => -1));
        if ( $loop->have_posts() ) :
            while ( $loop->have_posts() ) : $loop->the_post(); 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
            
            ?>
        

            <figure class="col-lg-4">
       
           <a href="<?php echo $image[0]?>" >
            <img src="<?php echo $image[0]?>" class="img-fluid"/>
            </a>
            <figcaption >caption</figcaption>

           </figure>
   
           

        <?php endwhile; 
       endif;
   wp_reset_postdata();
   ?>

</div>
</div>

</div>