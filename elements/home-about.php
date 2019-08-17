<section id="about" class="about">
<div class="container">
    <div class="row about__header">
        <div class="col-12">
        <?php header_h1_acf(get_field('about_header')); ?> 
            </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-12">
        <?php image_acf(get_field('about_image')); ?>  
        </div>
        <div class="col-md-8 col-sm-12">
        <?php texteditor_acf(get_field('about_content')); ?>  

        </div>
    </div>
</div>
</section>