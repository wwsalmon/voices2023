<form action="<?php echo home_url()?>" method="get">
    <div class="flex h-8 items-center">
        <input class="w-full block border font-ss h-full p-1" type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search stories" />
        <input type="hidden" name="post_type" value="post" />
        <button type="submit" class="bg-tred text-white ml-auto w-8 h-full flex-shrink-0 flex items-center justify-center block"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</form>