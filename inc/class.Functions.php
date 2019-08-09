<?php 
class Functions {
    public function __construct() {
        $this->add_actions();
        $this->add_filters();
        $this->theme_setup();
        
    }
    public function add_actions() {
        add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts_and_styles' ) );
     
    }
    public function theme_setup() {

    }

    public function add_filters(){
       
    }

    public function load_scripts_and_styles() {
        wp_enqueue_style('thatshim_css', get_template_directory_uri() . '/dist/dist.min.css', array(), '1.0.0', 'all');
        wp_enqueue_script('thatshim_js', get_template_directory_uri() . '/dist/dist.min.js', array('jquery'),  '1.0.0', true);
    }
}

$functions = new Functions;