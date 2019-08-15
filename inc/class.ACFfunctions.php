<?php
class ACFfunctions extends Functions {
    public function __construct() {
        
        function image_acf_background_css($image){
            if( !empty($image) ){ 
               echo $image['url'];
           }
        }

    }   
}
new ACFfunctions;