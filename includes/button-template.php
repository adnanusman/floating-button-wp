<?php
function flbtn_create_button() {
  // grab data from theme customizer
  $button_text = get_theme_mod('set_flbtn_txt');
  
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

add_action('get_footer', 'flbtn_create_button');