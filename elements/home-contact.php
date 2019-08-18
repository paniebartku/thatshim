<section id="contact" class="contact global">
<div class="container">
    <div class="row global__header">
        <div class="col-12">
            <?php header_h1_acf(get_field('contact_header')); ?> 
        </div>
    </div>
    <div class="row">
        <div class="offset-md-1 col-md-10 col-sm-12 col-12>
        <?php 
     
        echo do_shortcode(get_field('form_code')); 
        ?>
        </div>
    </div>
    </div>
</section>