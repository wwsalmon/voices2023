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

function catch_that_image($post_id)
{
    $post = get_post($post_id);
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if (empty($first_img)) {
        // see if it's just an issue with image not having quotes, not necessarily missing them entirely
        $output = preg_match_all('<img.+src=([^\'"\s]+)[\'"\s].*>', $post->post_content, $matches);
        $first_img = $matches[1][0];
        if (empty($first_img)){
            $first_img = false;
        }
    }
    return $first_img;
}

add_theme_support( 'post-thumbnails' );

function add_customizer_options($wp_customize) {
    $wp_customize->add_section("home-cta", array("title" => "Homepage call to action"));
    $wp_customize->add_setting("home-cta-image");
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, "home-cta-image-control",array(
        "label"=>"Home CTA thumbnail",
        "section"=>"home-cta",
        "settings"=>"home-cta-image",
        "width"=>1000,
        "height"=>1000,
        "flex-width"=>false,
        "flex-height"=>false,
    )));
    $wp_customize->add_setting("home-cta-text");
    $wp_customize->add_control("home-cta-text-control", array(
        "label"=>"Home CTA text",
        "section"=>"home-cta",
        "settings"=>"home-cta-text",
        "type"=>"string",
    ));
    $wp_customize->add_setting("home-cta-button-text");
    $wp_customize->add_control("home-cta-button-text-control", array(
        "label"=>"Home CTA button text",
        "section"=>"home-cta",
        "settings"=>"home-cta-button-text",
        "type"=>"string",
    ));
    $wp_customize->add_setting("home-cta-button-url");
    $wp_customize->add_control("home-cta-button-url-control", array(
        "label"=>"Home CTA button url",
        "section"=>"home-cta",
        "settings"=>"home-cta-button-url",
        "type"=>"url",
    ));
}

add_action("customize_register", "add_customizer_options");