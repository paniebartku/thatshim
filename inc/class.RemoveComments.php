<?php
class RemoveComments extends Functions {
    public function __construct() {
        add_action('admin_init', array($this, 'disable_comments_post_types_support') );
        add_filter('comments_open', array($this, 'disable_comments_status' ) , 20, 2);
        add_filter('pings_open', array($this, 'disable_comments_status' ), 20, 2);
        add_filter('comments_array', array ($this, 'disable_comments_hide_existing_comments'), 10, 2);
        add_action('admin_menu', array ($this, 'disable_comments_admin_menu') );
        add_action('admin_init', array ($this, 'disable_comments_admin_menu_redirect' ) );
        add_action('admin_init', array($this, 'disable_comments_dashboard'));
        add_action('init', array($this, 'disable_comments_admin_bar'));
        add_action('wp_before_admin_bar_render', array($this, 'disable_icon_admin_bar' ) );
    
    }   
    function disable_comments_post_types_support() {
        $post_types = get_post_types();
        foreach ($post_types as $post_type) {
            if(post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    }   
    function disable_comments_status() {
        return false;
    } 
    function disable_comments_hide_existing_comments($comments) {
        $comments = array();
        return $comments;
    } 
    function disable_comments_admin_menu() {
        remove_menu_page('edit-comments.php');
        remove_submenu_page( 'options-general.php','options-discussion.php' ); 
       
    }
    function disable_comments_admin_menu_redirect() {
        global $pagenow;
        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url()); exit;
        }
        if ($pagenow === 'options-discussion.php') {
            wp_redirect(admin_url()); exit;
        }
    }
    function disable_comments_dashboard() {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }
    function disable_comments_admin_bar() {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    }
    function disable_icon_admin_bar() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
}
new RemoveComments;
