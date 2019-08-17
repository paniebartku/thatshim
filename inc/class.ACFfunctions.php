<?php
class ACFfunctions extends Functions {
    public function __construct() {

        function image_acf($image){
            if( !empty($image) ){ 
                   echo '<img class="img-fluid" src="'.$image['url'].'" alt="'.$image['alt'].'"/>';
             }
        }
        function image_acf_background_css($image){
            if( !empty($image) ){ 
               echo $image['url'];
           }
        }
        function header_h1_acf($text){
            if( !empty($text) ){ 
               echo '<h1>'.$text.'</h1>';
           }
        }
        function texteditor_acf($text){
            if( !empty($text) ){ 
               echo $text;
           }
        }

    }   
}
new ACFfunctions;