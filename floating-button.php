<?php
/**
* Plugin name: Floating Button WP
* Description: Floating button to unveil anything you want, in my case it was a contact form.
* Version: 1.1
* Github: https://github.com/adnanusman
* Github URI: https://github.com/adnanusman/floating-button-wp.git
* License: GNU General Public License v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* Author: Adnan Usman
* Author URI: https://www.tacticalengine.com/
* Text Domain: floating-button
**/

// Enqueue Scripts
function flbtn_add_scripts() {
  wp_enqueue_style( 'flbtn-css', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), '1.0.0', 'all' );
  // wp_enqueue_script( 'flbtn-js', plugin_dir_url( __FILE__ ) . 'js/flbtn.js', array(), '1.0.0', true );
}

add_action('wp_enqueue_scripts', 'flbtn_add_scripts');

// create text domain
$textdomain = 'floating-button';
load_plugin_textdomain( $textdomain, FALSE, basename( plugin_dir_url( __FILE__ ) . 'lang/'));

// Exit if accessed directly
if(!defined('ABSPATH')) {
  exit;
}

// Include the button template
require(plugin_dir_path(__FILE__) . 'includes/button-template.php');

// Create the sidebar
require(plugin_dir_path(__FILE__) . 'includes/content-sidebar.php');

// Create options in theme customizer
require(plugin_dir_path(__FILE__) . 'includes/customizer.php');

function flbtn_customize_btn_colors() {
  $flbtn_bg = get_option('set_flbtn_bg');
  $flbtn_color = get_option('set_flbtn_color');

  if ($flbtn_bg != '#222' || $flbtn_color != 'blue') :
  ?> 
    <style type="text/css">
      .flbtn-container {
        background: <?php echo $flbtn_bg; ?>;
      }
      .floating-button {
        background: <?php echo $flbtn_color; ?>;
      }
    </style>
  <?php
  endif;
}

add_action('wp_head', 'flbtn_customize_btn_colors');

function flbtn_hide_show_content() {

  //$button_text = get_option( 'set_flbtn_txt' );
  //$closebtn_text = get_option( 'set_close_txt' );
  // Setting default values for the button texts before user sets new ones
  $button_text = ( ! get_option('set_flbtn_txt')) ? "Request Estimate" : get_option('set_flbtn_txt');
  $closebtn_text = ( ! get_option('set_close_txt')) ? "Close Form" : get_option('set_close_txt');
  echo "
  <script type='text/javascript'>
  document.addEventListener('DOMContentLoaded', function(){
    var floatingButton = document.querySelector('.floating-button');

    floatingButton.addEventListener('click', showHiddenContent);

    let clicked = false;

    function showHiddenContent(e) {
      const hiddenContent = document.querySelector('.content-sidebar');
      if(clicked === false) {
        hiddenContent.style.display = 'block';
        e.target.innerHTML = '".$closebtn_text."'
        clicked = !clicked;
      } else {
        hiddenContent.style.display = 'none';
        e.target.innerHTML = '".$button_text."';
        clicked = !clicked;
      }
    }
  });
  </script>";
}

add_action('wp_head', 'flbtn_hide_show_content');
