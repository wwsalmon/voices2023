<?php get_header();
?>
    <div class="lg:flex max-w-6xl mx-auto py-24 px-4">
        <div class="lg:w-44 flex-shrink-0 lg:mr-16 mb-16">
            <h1 id="about-heading" class="text-5xl sm:text-7xl md:text-8xl font-black italic text-tlightpurple lg:text-right uppercase lg:-rotate-90 origin-top-left relative pointer-events-none">About</h1>
            <style>
                @media(min-width:1024px){
                    #about-heading {
                        height:420px;width:420px;top:420px;left:-8px;
                    }   
                }
            </style>
            <p class="font-ss text-tlightgray text-xl leading-normal mt-6"><?php echo get_post_meta(get_the_ID(), "tagline", true)?></p>
        </div>
        <div class="w-full">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php echo get_the_post_thumbnail( null, "full" )?>
                <p class="my-12 text-xl sm:text-2xl md:text-3xl text-tpurple font-semibold" style="line-height: 1.5"><?php echo get_post_meta(get_the_ID(), "main", true)?></p>
                <div class="max-w-xl sm:max-w-2xl content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
get_footer();