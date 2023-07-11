<?php get_header();
?>
    <div class="lg:flex max-w-6xl mx-auto py-24 px-4">
        <div class="lg:w-44 flex-shrink-0 lg:mr-16 mb-16">
            <h1 id="apply-heading" class="text-5xl sm:text-7xl md:text-8xl font-black italic text-tred lg:text-right uppercase lg:-rotate-90 origin-top-left relative pointer-events-none">Apply to Voices</h1>
            <style>
                @media(min-width:1024px){
                    #apply-heading {
                        height:520px;width:520px;top:520px;left:-8px;
                    }   
                }
            </style>
            <p class="font-ss text-tlightgray text-xl leading-normal mt-6"><?php echo get_post_meta(get_the_ID(), "tagline", true)?></p>
        </div>
        <div class="w-full">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="max-w-2xl p-8 text-white bg-tgray">
                    <p class="font-bold text-xl sm:text-2xl">The Voices 2023 cycle is now closed for applications.</p>
                    <div class="content">
                        <p>For updates on the cohort and 2024 applications, follow Voices on Twitter and Instagram and subscribe to the AAJA newsletter using the link below.</p>
                        <a href="https://www.aaja.org/news-and-resources/newsletter-archives/" class="px-[10px] py-2 inline-flex items-center justify-center uppercase bg-tred font-semibold text-white">
                            Subscribe to AAJA's newsletter
                        </a>
                    </div>
                </div>
                <div class="max-w-xl sm:max-w-2xl content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
get_footer();