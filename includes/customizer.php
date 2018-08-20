<?php
// access the theme customizer
function flbtn_customizer( $wp_customize) {

  // create floating button section
  $wp_customize-> add_section( 'sec_flbtn', array( 
    'title' => __( 'Floating Button', 'floating-button' ),
    'description' => __( 'Floating button settings', 'floating-button' ),
  ));

  // Setting to enable the floating button
  $wp_customize-> add_setting( 'set_flbtn_active', array(
    'type' => 'option',
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_attr'
  ));

  $wp_customize-> add_control( 'ctrl_flbtn_active', array(
    'label' => __( 'Enable Button', 'floating-button' ),
    'description' => __( 'Enabling this will make the button visible on your website', 'floating-button' ),
    'section' => 'sec_flbtn',
    'settings' => 'set_flbtn_active',
    'type' => 'checkbox'
  ));

  // Add button text setting
  $wp_customize-> add_setting( 'set_flbtn_txt', array(
    'type' => 'option',
    'default' => __( 'Request Estimate', 'floating-button' ),
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_attr'
  ));

  $wp_customize-> add_control( 'ctrl_flbtn_txt', array(
    'label' => __( 'Button Text', 'floating-button' ),
    'description' => __( 'Enter text you want displayed on the button', 'floating-button' ),
    'section' => 'sec_flbtn',
    'settings' => 'set_flbtn_txt',
    'type' => 'text'
  ));
  
  $wp_customize-> add_setting( 'set_close_txt', array(
    'type' => 'option',
    'default' => __( 'Close Form', 'floating-button' ),
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_attr'
  ));

  $wp_customize-> add_control( 'ctrl_close_txt', array(
    'label' => __( 'Close Button Text', 'floating-button' ),
    'description' => __( 'Enter text you want displayed when the hidden content is visible', 'floating-button' ),
    'section' => 'sec_flbtn',
    'settings' => 'set_close_txt',
    'type' => 'text'
  ));

  $wp_customize->add_setting( 'set_flbtn_bg', 
  array(
    'type' => 'option',
    'default' => '#222222',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'set_flbtn_bg',
    array(
      'label' => __( 'Button background color', 'floating-button' ),
      'section' => 'sec_flbtn',
      'settings' => 'set_flbtn_bg'
    )
  ));

  $wp_customize->add_setting( 'set_flbtn_color', 
  array(
    'type' => 'option',
    'default' => 'blue',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'set_flbtn_color',
    array(
      'label' => __( 'Button color', 'floating-button'),
      'section' => 'sec_flbtn',
      'settings' => 'set_flbtn_color'
    )
  ));
}

add_action( 'customize_register', 'flbtn_customizer' );

// // Create settings page -- admin side only
// if(is_admin()) {
//   function flbtn_options_menu_link() {
//     add_options_page(
//       'Floating Button Settings',
//       'Floating Button',
//       'manage_options',
//       'flbtn-options',
//       'flbtn_options_content'
//     );
//   }
  
//   // Create options page content
//   function flbtn_options_content() {
//     echo 'TEST';
//   }
  
//   add_action('admin_menu', 'flbtn_options_menu_link');
  
//   // Register settings
//   function ftbn_register_settings() {
//     register_setting('flbtn_settings_group', 'flbtn_settings');
//   }
  
//   add_action('admin_init', 'flbtn_register_settings');
// }
