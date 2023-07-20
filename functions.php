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
    wp_enqueue_style('fontawesome', "https://use.fontawesome.com/releases/v6.4.0/css/all.css", false, NULL, 'all' );
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
    $wp_customize->add_section("home-cta", array("title" => "Homepage box"));
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
    $wp_customize->add_control("home-cta-button-url-ctrl", array(
        "label"=>"Home CTA button url",
        "section"=>"home-cta",
        "settings"=>"home-cta-button-url",
        "type"=>"url",
    ));
    $wp_customize->add_section("people", array("title"=>"People page"));
    $wp_customize->add_setting("people-default-cat");
    $wp_customize->add_control("home-cta-button-url-control", array(
        "label" => "Default people category (current cohort)",
        "section" => "people",
        "settings" => "people-default-cat",
        "type" => "select",
        "choices" => theme_get_categories(),
    ));
    $wp_customize->add_section("topbar-section", array("title"=>"Topbar settings"));
    $wp_customize->add_setting("topbar-apply", array("default"=>false));
    $wp_customize->add_control("topbar-apply-control", array(
        "label" => "Show Apply as main navbar CTA? If unchecked, Donate will be navbar CTA",
        "section" => "topbar-section",
        "settings" => "topbar-apply",
        "type" => "checkbox",
    ));
}

add_action("customize_register", "add_customizer_options");

function wpd_fix_category_requests( $request ){
    if( array_key_exists( 'category_name' , $request )
        && ! get_term_by( 'slug', basename( $request['category_name'] ), 'category' ) ){
            $request['name'] = basename( $request['category_name'] );
            unset( $request['category_name'] );
    }
    return $request;
}

add_filter( 'request', 'wpd_fix_category_requests' );

function get_current_page_url() {
    global $wp;
    return add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
}

function theme_get_categories() {
    $categories = get_sorted_categories();
    $choices = array();

    foreach ($categories as $category) {
        $choices[$category->slug] = $category->name;
    }

    return $choices;
}

add_filter('acf/settings/remove_wp_meta_box', '__return_false', 20); // override ACF removing custom fields. https://wordpress.org/support/topic/does-cpt-ui-disable-custom-fields/

function compare_cats($a, $b) {
    $a_year = intval(substr($a->name, -4));
    $b_year = intval(substr($b->name, -4));
    return $b_year - $a_year;
}

function get_sorted_categories() {
    $categories = get_categories();

    usort($categories, compare_cats);

    return $categories;
}

function unformatted_shortcode($atts, $content = null) {
    return '<div>' . do_shortcode($content) . '</div>';
}
add_shortcode('html', 'unformatted_shortcode');

function linkbutton_shortcode($atts, $content = null) {
    return '<a class="block my-8 px-[10px] py-2 inline-flex items-center justify-center uppercase bg-tred font-semibold text-white" href="' . $atts["href"] . '">' . do_shortcode($content) . '</a>';
}
add_shortcode('linkbutton', 'linkbutton_shortcode');

@ini_set( 'upload_max_filesize' , '32M' );
@ini_set( 'post_max_size', '32M');
@ini_set( 'max_execution_time', '300' );