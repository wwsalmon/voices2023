<?php get_header();
$prev_cat = "";
$categories = get_sorted_categories();
?>
    <div class="max-w-xl mx-auto my-24 relative px-4">
        <?php if (is_category()):
        $page_category = get_category(get_query_var("cat"));
        $this_cat = $page_category->name;
        $this_year = substr($this_cat, -4);
        $this_location = substr($this_cat, 0, -4);
        ?>
            <div class="relative lg:-left-52 mb-16 lg:whitespace-nowrap">
                <p class="text-2xl md:text-3xl lg:text-4xl tracking-widest font-black text-tlightpurple uppercase mb-4">Student work</p>
                <h1 class="text-5xl sm:text-6xl lg:text-7xl text-tpurple">
                    <span class="italic font-ss font-light"><?php echo $this_location?></span>
                    <span class="font-semibold"><?php echo $this_year?></span>
                </h1>
            </div>
        <?php endif;?>
        <div class="relative">
            <div class="lg:absolute lg:w-40 lg:-left-52 mb-24">
                <?php if (is_category()): ?>
                    <a href="<?php echo home_url("/stories")?>" class="px-[10px] py-2 inline-flex items-center justify-center uppercase bg-tred font-semibold text-white">
                        < Back to all
                    </a>
                <?php else: ?>
                    <h1 class="lg:text-right text-5xl md:text-6xl lg:text-7xl font-black italic text-tred leading-none uppercase text-tyellow lg:-rotate-90 origin-top-left relative pointer-events-none" id="student-work">Student work</h1>
                    <style>
                        @media(min-width:1024px){
                            #student-work {
                                height:420px;width:420px;top:420px;left:-8px;
                            }   
                        }
                    </style>
                <?php endif; ?>
                <p class="font-black uppercase tracking-widest mt-12 mb-6 text-xs">By cohort</p>
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
                if ($this_cat != $prev_cat && !is_category()): ?>
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
                    <?php
                    $tags = array_values(array_filter(get_the_tags(), function($t) {return $t->name != "Featured";}));
                    ?>
                    <p class="text-xs flex items-center uppercase font-black mt-8 tracking-widest">
                        <span class="text-tred"><?php echo $tags[0]->name ?></span>
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
            <div class="hidden lg:block w-44 absolute -right-56 <?php if (!is_category()) {echo "top-[152.5px]";} else {echo "top-0";} ?>">
                <?php
                $featured = get_posts(array("tag"=>"Featured"));
                foreach($featured as $featuredpost): ?>
                    <a href="<?php the_permalink($featuredpost)?>" class="block mb-10 opacity-75 hover:opacity-100">
                        <?php echo get_the_post_thumbnail($featuredpost, array(60, 60) ) ?>
                        <h3 class="mt-4 font-ss"><?php echo get_the_title($featuredpost)?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php
endif;
get_footer();