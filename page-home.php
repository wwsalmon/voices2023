<?php get_header();
?>
    <div class="w-full sm:flex items-stretch">
        <img src="<?php echo get_template_directory_uri() . '/img/hero.jpg'; ?>" alt="Photo of Voices fellow standing against AAJA backdrop onstage" class="sm:w-2/5 object-cover block">
        <div class="sm:w-3/5">
            <div class="max-w-2xl ml-4 mr-4 sm:ml-8 md:ml-16 sm:py-24 py-12">
                <p class="text-4xl md:text-5xl font-ss mb-8 md:mb-16" style="line-height: 1.2">
                    <span class="font-light">Learn reporting from veteran journalists at the</span> <i>Los Angeles Times</i>, <i>Associated Press</i><span class="font-light"> and more.</span>
                </p>
                <div class="my-12 sm:my-16 max-w-md p-3 bg-tblue relative rounded-t rounded-br flex items-center text-white" id="home-box">
                    <img src="<?php echo wp_get_attachment_url(get_theme_mod("home-cta-image", ""))?>" class="w-24 h-24 sm:w-32 sm:h-32 mr-4 flex-shrink-0 rounded" alt="">
                    <div>
                        <p class="sm:text-xl font-bold mb-3" style="line-height: 1.4"><?php echo get_theme_mod("home-cta-text", "Fellow and editor applications due March 3")?></p>
                        <a href="<?php echo get_theme_mod("home-cta-button-url", get_home_url("/apply"))?>" class="px-[10px] h-10 inline-flex items-center justify-center uppercase bg-tred font-semibold text-white">
                            <?php echo get_theme_mod("home-cta-button-text", "Apply now")?>
                        </a>
                    </div>
                </div>
                <style>
                    #home-box:before {
                        content: "";
                        width: calc(100% - 20px);
                        background-color: #343534;
                        height: 10px;
                        position: absolute;
                        left: 0;
                        bottom: -10px;
                        border-radius: 0px 0px 4px 4px;
                    }
                </style>
                <p class="text-lg md:text-xl leading-normal">
                    <b>AAJA Voices is a multimedia journalism fellowship for college students</b> that runs each summer, culminating in a week in-person at the national AAJA convention.
                </p>
            </div>
        </div>
    </div>
    <div class="h-[10px] bg-tyellow w-full"></div>
    <div class="w-full bg-tpurple py-16 sm:py-24 text-white px-4">
        <div class="max-w-5xl mx-auto lg:flex items-start">
            <div class="lg:w-72 flex-shrink-0 lg:mr-20">
                <p class="font-black text-[36px] text-tyellow mb-12 leading-tight">Add real, hard-hitting stories to your portfolio</p>
                <p class="text-xl leading-normal mb-12">30 years of impactful investigations and previously untold stories speak for themselves</p>
                <a href="" class="px-4 py-2 inline-flex items-center text-lg justify-center uppercase bg-tyellow font-semibold block mb-16 lg:mb-32 text-tgray">
                    Read student work
                </a>
                <div class="hidden lg:block">
                    <p class="font-black uppercase tracking-wider mb-6">By cohort</p>
                    <?php
                    $categories = get_categories();
                    foreach($categories as $category): ?>
                        <a href="<?php echo get_category_link($category->term_id) ?>" class="opacity-50 hover:opacity-100 font-semibold my-6 block"><?php echo $category->name ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="w-full">
                <?php
                $featured = get_posts(array("tag"=>"Featured"));
                $firstpost = array_shift($featured);
                ?>
                <a href="<?php the_permalink($firstpost)?>" class="block mb-24">
                    <?php echo get_the_post_thumbnail($firstpost, array(300, 200) ) ?>
                    <p class="uppercase text-tyellow font-black tracking-widest my-10"><?php echo get_the_category( $firstpost )[0]->name ?></p>
                    <h3 class="font-ss text-4xl sm:text-5xl md:text-6xl font-black"><?php echo get_the_title($firstpost)?></h3>
                </a>
                <div class="sm:grid grid-cols-2 gap-x-12">
                    <?php foreach($featured as $post): ?>
                        <a href="<?php the_permalink($post)?>" class="block mb-16">
                            <?php echo get_the_post_thumbnail($post, array(112, 112) ) ?>
                            <p class="text-xs uppercase text-tyellow font-black tracking-widest my-6"><?php echo get_the_category( $post )[0]->name ?></p>
                            <h3 class="font-ss text-xl" style="line-height: 1.125"><?php echo get_the_title($post)?></h3>
                        </a>
                    <?php
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="h-[10px] bg-tblue w-full"></div>
    <div class="py-24 text-center px-4">
        <p class="text-5xl font-black text-tblue mb-12">Get noticed by industry leaders</p>
        <a href="<?php echo home_url("/people")?>" class="px-4 py-3 inline-flex items-center text-lg justify-center uppercase bg-tblue font-semibold mb-12 text-white" style="line-height: 1.1;">
            MEET our editors, fellows and alumni
        </a>

        <img src="<?php echo get_template_directory_uri() . '/img/twitter.jpg'; ?>" alt="Screenshots of tweets from industry leaders praising Voices student work" class="w-full">
    </div>
<?php
get_footer();