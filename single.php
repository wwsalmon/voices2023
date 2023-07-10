<?php get_header();
?>
<?php
    while (have_posts()) : the_post();?>
    <div class="max-w-5xl mx-auto px-4 py-12">
        <?php
        $tags = array_values(array_filter(get_the_tags(), function($t) {return $t->name != "Featured";}));
        ?>
        <p class="text-tred uppercase font-black tracking-[1.6px]"><?php echo $tags[0]->name ?></p>
        <p class="font-ss"><a href="<?php echo home_url("/stories")?>" class="underline">Student work</a> • <a href="<?php echo get_category_link(get_the_category()[0]) ?>" class="italic underline"><?php echo get_the_category()[0]->name ?></a></p>
        <h1 class="font-ss font-black text-5xl sm:text-6xl md:text-7xl max-w-4xl mt-4 mb-8 sm:mb-16" style="line-height: 1.1;"><?php the_title() ?></h1>
        <div class="md:flex">
            <div class="md:ml-12 md:mt-0 order-2">
                <p class="text-2xl leading-normal"><img src="<?php echo get_template_directory_uri() . '/img/v.png'; ?>" class="h-5 inline"/> <?php echo get_the_excerpt(); ?></p>
                <p class="text-tlightgray my-6 font-ss">Published <?php echo the_date("F j, Y"); ?></p>
                <?php
                $authors = get_coauthors();
                foreach($authors as $author):
                ?>
                    <div class="flex items-center my-3">
                        <img class="block h-6 w-6 rounded-full mr-3 object-cover" src="<?php echo wp_get_attachment_image_url($author->get("photo")); ?>" alt="Headshot of <?php echo $author->get("display_name") ?>">
                        <span class="font-ss text-sm"><?php echo $author->get("display_name"); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="flex-shrink-0 order-1 mt-8 md:mt-0 md:w-2/3 lg:w-[600px]">
                <?php echo get_the_post_thumbnail( null, "full" )?>
                <p class="text-xs text-tlightgray mt-3"><?php echo get_the_post_thumbnail_caption()?></p>
            </div>
        </div>
    </div>
    <div class="max-w-xl md:max-w-2xl mx-auto px-4 content content-drop">
        <?php the_content(); ?>
    </div>
    <div class="max-w-4xl mx-auto px-4 my-28">
        <h2 class="text-tyellow text-7xl font-ss font-light">Authors</h2>
        <?php foreach($authors as $author):
            $bio = $author->get("bio");
            $twitter = $author->get("twitter");
            $linkedin = $author->get("linkedin");
        ?>
            <div class="my-16 flex">
                <img class="w-20 h-20 sm:w-28 sm:h-28 flex-shrink-0" src="<?php echo wp_get_attachment_image_url($author->get("photo")); ?>" alt="Headshot of <?php echo $author->get("display_name") ?>">
                <div class="ml-6 sm:ml-8">
                    <h3 class="text-xl font-bold mb-3"><?php echo $author->get("display_name") ?></h3>
                    <p class="mb-3 font-ss"><span class="italic"><?php echo $author->get("org")?></span> <?php if($bio) {echo " — ".$bio;}?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endwhile; ?>
<?php
get_footer();