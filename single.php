<?php get_header();
?>
<?php
    while (have_posts()) : the_post();?>
    <div class="max-w-5xl mx-auto px-4 py-12">
        <p class="text-tred uppercase font-black tracking-[1.6px]"><?php echo get_the_tags()[0]->name ?></p>
        <p class="font-ss"><a href="" class="underline">Student work</a> • <a href="" class="italic underline"><?php echo get_the_category()[0]->name ?></a></p>
        <h1 class="font-ss font-black text-7xl max-w-4xl mt-4 mb-16"><?php the_title() ?></h1>
        <div class="sm:flex">
            <img src="<?php echo catch_that_image(get_the_ID())?>" alt="" class="w-[600px]">
            <div class="ml-12">
                <p class="text-2xl leading-normal"><img src="<?php echo get_template_directory_uri() . '/img/v.png'; ?>" class="h-5 inline"/> <?php echo get_the_excerpt(); ?></p>
                <p class="text-tlightgray my-5 font-ss">Published <?php echo the_date("F j, Y"); ?></p>
            </div>
        </div>
    </div>
    <div class="max-w-3xl mx-auto px-4 content" style="font-size: 18px;">
        <?php the_content(); ?>
    </div>
    <div class="max-w-4xl mx-auto px-4 my-28">
        <h2 class="text-tyellow text-7xl font-ss font-light">Authors</h2>
    </div>
<?php endwhile; ?>
<?php
get_footer();