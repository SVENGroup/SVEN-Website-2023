<?php


//Pe Core Custom CSS

function pe_core_custom_css() {
    $option = get_option( 'pe-redux' );
    
    if (!empty ($option['css_editor'])) {
        
         echo '<style type="text/css">' . $option['css_editor'] . '</style>';
        
    }
   
}
add_action('wp_head' , 'pe_core_custom_css');


