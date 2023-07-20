<?php get_header();
?>
<?php
    while (have_posts()) : the_post();?>
    <div class="max-w-5xl mx-auto px-4 py-12">
        <?php
        $tags = array_values(array_filter(get_the_tags(), function($t) {return $t->name != "Featured";}));
        $tag = $tags[0];
        $category = get_the_category()[0];
        ?>
        <p class="text-tred uppercase font-black tracking-[1.6px]"><?php echo $tag->name ?></p>
        <p class="font-ss"><a href="<?php echo home_url("/stories")?>" class="underline">Student work</a> • <a href="<?php echo get_category_link($category) ?>" class="italic underline"><?php echo get_the_category()[0]->name ?></a></p>
        <h1 class="font-ss font-black text-5xl sm:text-6xl md:text-7xl max-w-4xl mt-4 mb-8 sm:mb-16" style="line-height: 1.1;"><?php the_title() ?></h1>
        <div class="md:flex">
            <div class="md:ml-12 md:mt-0 order-2">
                <p class="text-2xl leading-normal"><img src="<?php echo get_template_directory_uri() . '/img/v.png'; ?>" class="h-5 inline"/> <?php echo get_the_excerpt(); ?></p>
                <p class="text-tlightgray my-6 font-ss">Published <?php echo the_date("F j, Y"); ?></p>
                <?php
                $authors = get_coauthors();
                foreach($authors as $author):
                if ($author->get("showemail")):?>
                    <a href="mailto:<?php echo $author->get("user_email")?>" class="underline">
                <?php endif;
                ?>
                    <div class="flex items-center my-3">
                        <img class="block h-6 w-6 rounded-full mr-3 object-cover" src="<?php echo wp_get_attachment_image_url($author->get("photo")); ?>" alt="Headshot of <?php echo $author->get("display_name") ?>">
                        <span class="font-ss text-sm"><?php echo $author->get("display_name"); ?></span>
                    </div>
                <?php
                if ($author->get("showemail")):?>
                    </a>
                <?php endif; endforeach; ?>
            </div>
            <div class="flex-shrink-0 order-1 mt-8 md:mt-0 md:w-2/3 lg:w-[600px]">
                <?php
                $youtube = get_post_meta(get_the_ID(), "youtube", true);
                if ($youtube) {
                ?>
                    <iframe src="<?php echo $youtube; ?>" frameborder="0" class="w-full aspect-video"></iframe>
                <?php
                } else {
                    echo get_the_post_thumbnail( null, "full" );
                }
                ?>
                <p class="text-xs text-tlightgray mt-3"><?php echo get_the_post_thumbnail_caption()?></p>
            </div>
        </div>
    </div>
    <div class="relative w-full">
        <div class="absolute hidden lg:block left-8 top-64 w-40">
            <?php
            $this_id = get_the_ID();
            $tagposts = get_posts(array("tag" => $tag->slug, "exclude" => array($this_id)));
            if (!empty($tagposts)):
            ?>
                <p class="text-tred uppercase text-xs mb-9 font-black tracking-[1.6px]"><?php echo $tag->name ?></p>
                <div class="mb-64">
                    <?php
                    foreach ($tagposts as $post):
                        get_template_part("template_parts/post-small");
                    endforeach;
                    ?>
                </div>
            <?php endif; ?>
            <?php
            $catposts = get_posts(array("category__in" => array($category->cat_ID), "exclude" => array($this_id)));
            if (!empty($catposts)):
            ?>
                <p class="text-tpurple uppercase text-xs mb-9 font-black tracking-[1.6px]">
                    <?php echo $category->name ?>
                </p>
                <div class="mb-64">
                    <?php
                    foreach ($catposts as $post):
                        get_template_part("template_parts/post-small");
                    endforeach;
                    ?>
                </div>
            <?php endif; ?>  
        </div>
        <div class="max-w-xl md:max-w-2xl mx-auto px-4">
            <?php
            $audio = get_post_meta($this_id, "audio", true);
            if ($audio) {
                $audio_url = wp_get_attachment_url($audio);
                if ($audio_url) {
                    ?>
                        <div class="p-8 bg-tpurple text-white border rounded mb-8">
                            <h3 class="font-bold text-2xl mb-3 font-ss">This is an audio story.</h3>
                            <p class="mt-2 mb-6 text-lg">Listen to it below:</p>
                            <audio controls class="w-full">
                                <source src="<?php echo $audio_url?>" type="audio/mpeg">
                            </audio>
                        </div>
                    <?php
                }
            }
            ?>
            <?php
            $storystream = get_post_meta($this_id, "storystream", true);
            $sshed = get_post_meta($this_id, "sshed", true);
            $ssdek = get_post_meta($this_id, "ssdek", true);
            if ($storystream && $sshed && $ssdek) {
                $ssposts = get_posts(array("meta_key"=>"storystream","meta_value"=>$storystream));
                ?>
                    <div class="p-8 bg-tlightpurple border rounded mb-8">
                        <p class="font-black uppercase text-tred tracking-widest mt-0 mb-3 text-xs font-sans">Storystream</p>
                        <h3 class="font-bold text-2xl mb-3 font-ss"><?php echo $sshed ?></h3>
                        <p class="mt-2 mb-6 text-lg"><?php echo $ssdek ?></p>
                        <div class="sm:grid grid-cols-2 gap-x-9 pt-6 border-t border-tgray">
                            <?php foreach ($ssposts as $post) {
                                get_template_part("template_parts/post-small");
                            } ?>
                        </div>
                    </div>
                <?php
            } ?>
            <div class="content content-drop">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <div class="max-w-4xl mx-auto px-4 my-28">
        <h2 class="text-tblue text-5xl sm:text-6xl md:text-7xl font-ss font-light">Authors</h2>
        <?php foreach($authors as $author):
            $bio = $author->get("bio");
            $twitter = $author->get("twitter");
            $linkedin = $author->get("linkedin");
        ?>
            <!-- <div class="my-16 flex">
                <img class="w-20 h-20 sm:w-28 sm:h-28 flex-shrink-0" src="<?php echo wp_get_attachment_image_url($author->get("photo")); ?>" alt="Headshot of <?php echo $author->get("display_name") ?>">
                <div class="ml-6 sm:ml-8">
                    <h3 class="text-xl font-bold mb-3"><?php echo $author->get("display_name") ?></h3>
                    <p class="mb-3 font-ss"><span class="italic"><?php echo $author->get("org")?></span> <?php if($bio) {echo " — ".$bio;}?></p>
                </div>
            </div> -->
            <div class="my-16">
                <?php get_template_part("template_parts/person", "person", array("author"=>$author)); ?>
            </div>
        <?php endforeach; ?>
        <?php
            if (!empty($tagposts) || !empty($catposts)):
        ?>
            <h2 class="text-tyellow text-5xl sm:text-6xl md:text-7xl font-ss font-light mb-9 mt-28">Read more</h2>
            <?php if (!empty($tagposts)): ?>
                <p class="text-tred uppercase text-xs mb-9 font-black tracking-[1.6px]"><?php echo $tag->name ?></p>
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-9 mb-20">
                    <?php
                    foreach ($tagposts as $post):
                        get_template_part("template_parts/post-small");
                    endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($catposts)): ?>
                <p class="text-tpurple uppercase text-xs mb-9 font-black tracking-[1.6px]">
                    <?php echo $category->name ?>
                </p>
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-9 mb-20">
                    <?php
                    foreach ($catposts as $post):
                        get_template_part("template_parts/post-small");
                    endforeach; ?>
                </div>
            <?php endif; ?>
            <a href="<?php echo home_url("/stories")?>" class="px-[10px] py-2 inline-flex items-center justify-center uppercase bg-tred font-semibold text-white">
                <i class="fa-solid fa-arrow-left mr-4"></i> All student work
            </a>
        <?php endif; ?>
    </div>
<?php endwhile; ?>
<?php
get_footer();