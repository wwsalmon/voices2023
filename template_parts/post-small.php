
<a href="<?php the_permalink($post)?>" class="block mb-10 opacity-75 hover:opacity-100">
    <?php echo get_the_post_thumbnail($post, array(60, 60) ) ?>
    <h3 class="mt-4 font-ss"><?php echo get_the_title($post)?></h3>
</a>