<?php get_header();
global $wp_query;
$num_results = $wp_query->found_posts;
?>
    <div class="max-w-xl mx-auto py-24 px-4">
        <h1 class="mb-16 uppercase italic font-black text-5xl text-tpurple">Search results for "<?php echo get_search_query(true); ?>"</h1>
        <a href="<?php echo home_url("/stories")?>" class="px-[10px] py-2 inline-flex items-center justify-center uppercase bg-tred font-semibold text-white mb-16">
            <i class="fa-solid fa-arrow-left mr-4"></i> Back to all
        </a>
        <p class="font-ss mb-16 text-tlightgray"><?php echo $num_results; ?> stor<?php if ($num_results == 1) {echo "y";} else {echo "ies";}?> found</p>
        <?php while ( have_posts() ) : the_post();
        get_template_part("template_parts/post");
        endwhile; ?>
        <?php the_posts_pagination()?>
    </div>
<?php
get_footer();