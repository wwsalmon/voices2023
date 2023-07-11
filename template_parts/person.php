<?php
$author = $args["author"];
$twitter = $author->get("twitter");
$linkedin = $author->get("linkedin");
?>
<div class="flex">
    <img class="w-24 h-24 md:w-32 md:h-32 flex-shrink-0 object-cover" src="<?php echo wp_get_attachment_image_url($author->get("photo"), array(1024,1024)); ?>" alt="Headshot of <?php echo $author->get("display_name") ?>">
    <div class="ml-6">
        <h3 class="text-xl font-black uppercase text-tblue mb-1"><?php echo $author->get("display_name") ?></h3>
        <p class="mb-5 font-ss italic text-xl text-tblue"><?php echo $author->get("org")?></p>
        <p class="text-xs font-ss leading-normal mb-5"><?php echo $author->get("bio")?></p>
        <div class="flex items-center text-tblue">
            <?php if ($twitter):?>
                <a href="<?php echo $twitter?>" class="mr-4"><i class="fa-brands fa-twitter"></i></a>
            <?php endif; ?>
            <?php if ($linkedin):?>
                <a href="<?php echo $linkedin?>" class="mr-4"><i class="fa-brands fa-linkedin"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>