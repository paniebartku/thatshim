<section id="music" class="music global">
    <div class="container">
        <div class="row global__header">
            <div class="col-12">
                <?php header_h1_acf(get_field('music_header')); ?> 
            </div>
        </div>
        <div class="row">
            <div class="offset-md-1 col-md-10 col-sm-12 col-12">
                <?php textarea_acf(get_field('music_code')); ?>
            </div>
        </div>
    </div>    
</section>