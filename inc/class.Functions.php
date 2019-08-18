<?php 
class Functions {
    public function __construct() {
  
        $this->add_actions();
        $this->add_filters();
        $this->theme_setup();

    }
   
    public function add_actions() {
        add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts_and_styles' ) );
        add_action( 'admin_head', array($this, 'dashboard_area_styles') );
        add_action( 'init', array( $this, 'cpt_photo_gallery' ) );
        add_action( 'manage_posts_custom_column', array($this, 'gallery_column_content'), 5, 2);
        add_action( 'init', array( $this, 'removes' ) );
        add_action('wp_dashboard_setup', array($this, 'disable_default_dashboard_widgets'), 666 );
        add_action('wp_dashboard_setup', array($this, 'add_your_dashboard_widget') );
        add_action( 'pre_get_posts', array($this, 'parse_request') );
        add_action( 'widgets_init', array( $this, 'footer_sidebars' ) );

    }

    public function theme_setup() {
        add_action( 'after_setup_theme', array( $this, 'theme_setup_core' ) );
       
    function your_dashboard_widget() { ?>
        <h3>Dzień dobry</h3>
        <p>Aby edytować zawartość swojej strony kliknij na link "Twoja strona" w lewym menu</p>
        <?php 
        }
        
    }

    public function theme_setup_core() {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo');
        add_theme_support( 'menus' );
        register_nav_menu( 'primary', 'Primary menu' );
    }

  
    public function add_filters(){
        add_filter( 'manage_posts_columns', array($this, 'gallery_column'), 5);
        add_filter( 'post_type_link', array($this, 'remove_slug' ),10, 3 );
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
        $defaults['riv_post_thumbs'] = __('Zdjęcie');
        return $defaults;
    }  

    public function gallery_column_content($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
            echo   the_post_thumbnail( 'featured-thumbnail', array( 'class' => 'img-fluid gallery_admin' ) );
        }
    }

    public function removes(){
        remove_post_type_support( 'page', 'thumbnail');
        remove_post_type_support( 'page', 'editor');
        remove_action('welcome_panel', 'wp_welcome_panel');
    }
  

    public function dashboard_area_styles() {
    echo 
    '<style>
        .gallery_admin {
            height: auto;
            max-width: 70%;
        }
        #wp-admin-bar-new-content {
            display:none;
        }
        #wp-admin-bar-archive {
            display: none;
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
    function add_your_dashboard_widget() {
        wp_add_dashboard_widget( 'your_dashboard_widget', __( 'Uwaga!' ), 'your_dashboard_widget' );
    }

    public function remove_slug( $post_link, $post ) {
        
        if ( 'gallery' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
        }
         
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
        return $post_link;
    }
    public function parse_request( $query ) {
            
        if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
            return;
        }
    
        if ( ! empty( $query->query['name'] ) ) {
            $query->set( 'post_type', array( 'post', 'gallery') );
        }
    }  
    public function footer_sidebars() {
        register_sidebar( array(
            'name' => __( 'Footer sidebar 1'),
            'id' => 'footer-sidebar-1',
            'description' => __( 'First footer sidebar'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-main__sidebar-title">',
            'after_title'   => '</h3>',
            ) );
        register_sidebar( array(
            'name' => __( 'Footer sidebar 2'),
            'id' => 'footer-sidebar-2',
            'description' => __( 'Second footer sidebar'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-main__sidebar-title">',
            'after_title'   => '</h3>',
            ) );
        register_sidebar( array(
            'name' => __( 'Footer sidebar 3'),
            'id' => 'footer-sidebar-3',
            'description' => __( 'Third footer sidebar'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-main__sidebar-title">',
            'after_title'   => '</h3>',
            ) );
    
    }


}


$functions = new Functions;


