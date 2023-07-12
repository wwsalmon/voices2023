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