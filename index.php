<?php get_header();
$prev_cat = "";
$categories = get_categories();
?>
    <div class="max-w-xl mx-auto py-24 px-4 relative">
        <div class="lg:absolute lg:w-40 lg:-left-48 mb-24">
            <h1 class="lg:text-right text-5xl md:text-6xl lg:text-7xl font-black italic text-tred leading-none uppercase text-tyellow lg:-rotate-90 origin-top-left relative pointer-events-none" id="student-work">Student work</h1>
            <style>
                @media(min-width:1024px){
                    #student-work {
                        height:420px;width:420px;top:420px;left:-8px;
                    }   
                }
            </style>
            <p class="font-black uppercase tracking-widest my-12 mb-6 text-xs">By cohort</p>
            <?php foreach($categories as $category): ?>
                <a href="<?php echo get_category_link($category->term_id) ?>" class="font-semibold my-4 text-tlightgray block"><?php echo $category->name ?></a>
            <?php endforeach; ?>
        </div>
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php
            $this_cat_obj = get_the_category()[0];
            $this_cat = $this_cat_obj->name;
            $this_year = substr($this_cat, -4);
            $this_location = substr($this_cat, 0, -4);
            if ($this_cat != $prev_cat): ?>
                <div class="mb-12">
                    <p class="text-xl tracking-widest font-black text-tlightpurple uppercase mb-4">Voices reports</p>
                    <a href="<?php echo get_category_link($this_cat_obj->term_id) ?>">
                        <h2 class="text-5xl sm:text-6xl text-tpurple">
                            <span class="italic font-ss font-light"><?php echo $this_location?></span>
                            <span class="font-semibold"><?php echo $this_year?></span>
                        </h2>
                    </a>
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