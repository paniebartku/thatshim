<?php
class RemovePosts extends Functions {
    public function __construct() {
      add_action('admin_menu', array ($this, 'disable_posts_admin_menu') );
      add_action('admin_bar_menu', array($this,  'remove_wp_nodes' ), 666 );
      add_action('admin_init', array ($this, 'disable_posts_admin_menu_redirect' ) );
      add_action( 'admin_menu', array($this, 'linked_url' ) );
      add_action( 'admin_menu' , array($this, 'linkedurl_function' ) );
    
    }   
    function disable_posts_admin_menu() {
        remove_menu_page('edit.php');
        remove_menu_page('edit.php?post_type=page');
    }
    function disable_posts_admin_menu_redirect() {
        global $pagenow;
        if ($pagenow === 'edit-tags.php') {
            wp_redirect(admin_url()); exit;
        }
        
    }
    
    function remove_wp_nodes() {
        global $wp_admin_bar;   
        $wp_admin_bar->remove_node( 'new-post' );
        $wp_admin_bar->remove_node( 'post-new' );
        $wp_admin_bar->remove_node( 'new-page' );

        }

    function linked_url() {
            add_menu_page( 'linked_url', 'Twoja strona', 'read', 'my_slug', '', 'dashicons-text', 1 );
            }

     function linkedurl_function() {
          global $menu;
         $menu[1][2] = get_admin_url()."post.php?post=9&action=edit";
                }
}
new RemovePosts;
