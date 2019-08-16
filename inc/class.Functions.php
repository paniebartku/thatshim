<?php 
class Functions {
    public function __construct() {
        $this->add_actions();
        $this->add_filters();
        $this->theme_setup();
        
    }
    public function theme_setup() {
        add_action( 'after_setup_theme', array( $this, 'theme_setup_core' ) );
    }

    public function add_actions() {
        add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts_and_styles' ) );
        add_action( 'admin_head', array($this, 'dashboard_area_styles') );
        add_action( 'init', array( $this, 'cpt_photo_gallery' ) );
        add_action( 'manage_posts_custom_column', array($this, 'gallery_column_content'), 5, 2);
        add_action( 'init', array( $this, 'removes' ) );
        add_action('wp_dashboard_setup', array($this, 'disable_default_dashboard_widgets'), 666 );

    }

    public function theme_setup_core() {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo');
        add_theme_support( 'menus' );
        register_nav_menu( 'primary', 'Primary menu' );
    }

  
    public function add_filters(){
        add_filter( 'manage_posts_columns', array($this, 'gallery_column'), 5);
    }

    public function load_scripts_and_styles() {
        wp_enqueue_style('thatshim_css', get_template_directory_uri() . '/dist/dist.min.css', array(), '1.0.0', 'all');
        wp_enqueue_script('thatshim_js', get_template_directory_uri() . '/dist/dist.min.js', array('jquery'),  '1.0.0', true);
    }

    public function cpt_photo_gallery(){
       
        register_post_type( 'gallery',
            array(
            'labels' => array(
                'name' => __( 'Gallery' ),
                'singular_name' => __( 'Photo' ),
                'add_new' => __( 'Add New Photo' ),
                'add_new_item' => __( 'Add New Photo' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit Photo' ),
                'new_item' => __( 'New Photo' ),
                'view' => __( 'View Photo' ),
                'view_item' => __( 'View Photo' ),
                'search_items' => __( 'Search Photo' ),
                'not_found' => __( 'No Photos found' ),
                'not_found_in_trash' => __( 'No Photos found in Trash' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon'   => 'dashicons-image-filter',
            'supports' => array('title', 'thumbnail')
        ));
    }

    public function gallery_column($defaults){
        $defaults['riv_post_thumbs'] = __('Logo');
        return $defaults;
    }  

    public function gallery_column_content($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
            echo   the_post_thumbnail( 'featured-thumbnail', array( 'class' => 'img-fluid' ) );
        }
    }

    public function removes(){
        remove_post_type_support( 'page', 'thumbnail');
        remove_action('welcome_panel', 'wp_welcome_panel');
    }
  

    public function dashboard_area_styles() {
    echo 
    '<style>
        .img-fluid {
            height: auto;
            max-width: 100%;
        }
        #wp-admin-bar-new-content {
            display:none;
        }
    </style>';
    }

    function disable_default_dashboard_widgets() {
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    
    }

}

$functions = new Functions;



function your_dashboard_widget() { ?>
    <h3>Dzień dobry</h3>
    <p>Aby edytować zawartość swojej strony kliknij na link "Twoja strona" w lewym menu</p>
    <?php };

    
    function add_your_dashboard_widget() {
      wp_add_dashboard_widget( 'your_dashboard_widget', __( 'Uwaga!' ), 'your_dashboard_widget' );
    }
    add_action('wp_dashboard_setup', 'add_your_dashboard_widget' );