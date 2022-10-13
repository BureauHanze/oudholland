<?php

add_action( 'wp_dashboard_setup', 'dashboard_widget' );
function dashboard_widget() {
  add_meta_box(
    'ia_dashboard_widget',
    'Welkom op je Bureau Hanze website',
    'dashboard_widget_display',
    '',
    'normal',
    'high'
  );
}

function dashboard_widget_display() {
    echo 'Welkom op je Bureau Hanze website. Heb je vragen? We helpen je graag! <br><br>Neem contact op met <a href="mailto:info@bureauhanze.nl"><strong>info@bureauhanze.nl</strong></a>';
}

// Description: Custom admin footer
function remove_footer_admin () {
  echo 'Powered by <a href="https://bureauhanze.nl" target="_blank">Bureau Hanze</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Remove WP admin dashboard widgets
function isa_disable_dashboard_widgets() {
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // Remove "Activity" which includes "Recent Comments"
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Remove Quick Draft
    remove_meta_box('dashboard_primary', 'dashboard', 'core'); // Remove WordPress Events and News
}
add_action('admin_menu', 'isa_disable_dashboard_widgets');