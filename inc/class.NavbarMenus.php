<?php

class PrimaryMenu extends Functions {
    public function __construct() {
        add_action( 'primary_nav', array($this, 'primary_nav'));
    }        
    public function primary_nav()
    {
        wp_nav_menu(
        array(
            'theme_location'  => 'primary',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => 'navbarText',
            'menu_class'      => 'navbar-nav',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'depth'           => 2,
            'walker'          => new WP_Bootstrap_Navwalker()
            )
        );
    }     
}
new PrimaryMenu;