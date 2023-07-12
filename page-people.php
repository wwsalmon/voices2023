<?php get_header();
$url = get_current_page_url();
$url_parts = parse_url($url);
parse_str($url_parts["query"], $query);
$category_slug = $query["program"];
$default_slug = get_theme_mod("category_setting", "los-angeles-2022");
if (!$category_slug) {
    $category_slug = $default_slug;
}
$category = get_category_by_slug( $category_slug );
if (!$category) {
    $category = get_category_by_slug($default_slug);
}
$category_name = $category->name;
$category_id = $category->cat_ID;
$this_year = substr($category_name, -4);
?>
    <div class="lg:flex max-w-6xl mx-auto py-24 px-4">
        <div class="lg:w-44 flex-shrink-0 lg:mr-16 mb-16">
            <h1 id="people-heading" class="text-5xl sm:text-7xl md:text-8xl font-black italic text-tlightblue lg:text-right uppercase lg:-rotate-90 origin-top-left relative pointer-events-none">People</h1>
            <style>
                @media(min-width:1024px){
                    #people-heading {
                        height:420px;width:420px;top:420px;left:-8px;
                    }   
                }
            </style>
            <p class="font-ss text-tlightgray text-xl leading-normal mt-6"><?php echo get_post_meta(get_the_ID(), "tagline", true)?></p>
            <p class="font-black uppercase tracking-widest mt-12 mb-6 text-xs">By cohort</p>
            <?php
            $categories = get_sorted_categories();
            foreach($categories as $category): ?>
                <a href="<?php echo home_url("/people")."?program=".($category->slug) ?>" class="opacity-50 hover:opacity-100 font-semibold my-6 block"><?php echo $category->name ?></a>
            <?php endforeach; ?>
        </div>
        <div class="w-full">
            <h2 class="font-ss font-light text-4xl sm:text-5xl mb-8 text-tblue"><?php echo $this_year ?> Leadership</h2>
            <div class="grid sm:grid-cols-2 gap-1 mb-16">
                <?php
                $fellows = get_users(array("role" => "Administrator", "meta_key" => "program", "meta_value" => serialize(strval($category_id)), "meta_compare" => "LIKE"));
                foreach($fellows as $author) {
                    get_template_part("template_parts/person", "person", array("author"=>$author));
                } ?>
            </div>
            <h2 class="font-ss font-light text-4xl sm:text-5xl mb-8 text-tblue"><?php echo $this_year ?> Fellows</h2>
            <div class="grid sm:grid-cols-2 gap-16 mb-16">
                <?php
                // , "meta_key" => "program", "meta_value" => $category->cat_ID, "meta_compare" => "LIKE"
                $fellows = get_users(array("role" => "Author", "meta_key" => "program", "meta_value" => serialize(strval($category_id)), "meta_compare" => "LIKE"));
                foreach($fellows as $author) {
                    get_template_part("template_parts/person", "person", array("author"=>$author));
                } ?>
            </div>
            <h2 class="font-ss font-light text-4xl sm:text-5xl mb-8 text-tblue"><?php echo $this_year ?> Editors</h2>
            <div class="grid sm:grid-cols-2 gap-16">
                <?php
                $fellows = get_users(array("role" => "Editor", "meta_key" => "program", "meta_value" => serialize(strval($category_id)), "meta_compare" => "LIKE"));
                foreach($fellows as $author) {
                    get_template_part("template_parts/person", "person", array("author"=>$author));
                } ?>
            </div>
        </div>
    </div>
<?php
get_footer();