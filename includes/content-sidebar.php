<?php 

add_action('widgets_init', 'flbtn_sidebar');

function flbtn_sidebar() {
  register_sidebar( array( 
    'name' => 'Floating Button',
    'id' => 'flbtn',
    'description' => 'Floating Button on Page',
    'before_widget' => '<div class="content-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
    )
  );
};