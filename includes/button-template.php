<?php
function flbtn_create_button() {
  // grab data from theme customizer
  $activate = get_option('set_flbtn_active');
  //$button_text = get_option('set_flbtn_txt');
  $button_text = ( ! get_option('set_flbtn_txt')) ? "Request Estimate" : get_option('set_flbtn_txt');
  
  if($activate == 1) {
    // get php output instead of echo
    ob_start();
      dynamic_sidebar('flbtn');
    $content_sidebar = ob_get_clean();

    // output the button
    $button_output = '<div class="flbtn-container"><button class="floating-button">';
    $button_output .= $button_text;
    $button_output .= '</button>';
    $button_output .= $content_sidebar . '</div>';
    
    echo $button_output;
  }
}

add_action('get_footer', 'flbtn_create_button');
