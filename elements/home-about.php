<section id="about" class="about global">
<div class="container">
    <div class="row global__header">
        <div class="col-12">
        <?php header_h1_acf(get_field('about_header')); ?> 
            </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="global__image">
                <?php image_acf(get_field('about_image')); ?>  
            </div>
        </div>
        <div class="offset-md-1 col-md-7 col-sm-12">
        <?php texteditor_acf(get_field('about_content')); ?>  

        </div>
    </div>
</div>
</section>