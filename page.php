<?php get_header();
?>
    <div class="max-w-xl md:max-w-2xl mx-auto py-24 px-4">
        <?php while ( have_posts() ) :
				the_post();
        ?>
        <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-black italic text-tred leading-none uppercase mb-8"><?php echo get_the_title( )?></h1>
        <p class="font-ss text-tlightgray text-xl leading-normal"><?php echo get_post_meta(get_the_ID(), "tagline", true)?></p>
        <div class="content"><?php the_content()?></div>
    </div>
<?php
endwhile;
get_footer();