<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo();?></title>

    <?php wp_head(); ?>
</head>
<body>
    <header class="header">

    <nav class="navbar navbar-expand-lg">
    <div class="container">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            echo '<img class="img-fluid" src="'. esc_url( $logo[0] ) .'">';?>
        </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <?php do_action('primary_nav'); ?>
    </div>
  </div>
</nav>

    </header>
    <style>
.header{
 background-image:url('<?php image_acf_background_css(get_field("header_image")) ?>');
}
</style>