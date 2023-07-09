<?php get_header();
$prev_cat = "";
?>
    <div class="max-w-xl mx-auto py-24 px-4">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php
            $this_cat = get_the_category()[0]->name;
            $this_year = substr($this_cat, -4);
            $this_location = substr($this_cat, 0, -4);
            if ($this_cat != $prev_cat): ?>
                <div class="mb-12">
                    <p class="text-xl tracking-widest font-black text-tlightpurple uppercase mb-4">Voices reports</p>
                    <h2 class="text-5xl sm:text-6xl text-tpurple">
                        <span class="italic font-ss font-light"><?php echo $this_location?></span>
                        <span class="font-semibold"><?php echo $this_year?></span>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="mb-16 sm:mb-24">
                <a href="<?php the_permalink()?>">
                    <?php echo get_the_post_thumbnail( null, array(1200,750) )?>
                </a>
                <p class="text-xs flex items-center uppercase font-black mt-8 tracking-widest">
                    <span class="text-tred"><?php echo get_the_tags()[0]->name ?></span>
                    <span class="text-tlightgray ml-2"><?php echo substr(get_the_category()[0]->name, -4) ?></span>
                </p>
                <a href="<?php the_permalink()?>">
                    <h3 class="font-ss text-4xl sm:text-5xl font-black my-4" style="line-height: 1.125"><?php the_title()?></h3>
                    <p class="max-w-md text-tlightgray text-lg leading-snug my-5"><?php echo get_the_excerpt()?></p>
                </a>
            </div>
        <?php
        $prev_cat = $this_cat;
        endwhile;
        ?>
        <?php the_posts_pagination()?>
    </div>
<?php
endif;
get_footer();