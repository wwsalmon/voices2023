<?php
function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');

function script_enqueue()
{
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,300;0,400;0,600;0,700;0,900;1,300;1,400;1,600;1,700;1,900&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;0,700;0,900;1,300;1,400;1,600;1,700;1,900&display=swap', [], null);
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/style.css', false, NULL, 'all' );
    wp_enqueue_style('twstyle', get_template_directory_uri() . '/css/tw.css', false, NULL, 'all' );
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fa.css', false, NULL, 'all' );
}
add_action('wp_enqueue_scripts', 'script_enqueue');