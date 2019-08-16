<?php
class RemovePosts extends Functions {
    public function __construct() {
        add_action('admin_menu', array ($this, 'disable_posts_admin_menu') );
        add_action('admin_bar_menu', array($this,  'remove_wp_nodes' ), 666 );
        add_action('admin_init', array ($this, 'disable_posts_admin_menu_redirect' ) );
 
    }   
    function disable_posts_admin_menu() {
        remove_menu_page('edit.php');
    }
    function disable_posts_admin_menu_redirect() {
        global $pagenow;
        if ($pagenow === 'edit.php') {
            wp_redirect(admin_url()); exit;
        }
    }
    function remove_wp_nodes() {
        global $wp_admin_bar;   
        $wp_admin_bar->remove_node( 'new-post' );

        }
}
new RemovePosts;

