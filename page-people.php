<?php get_header();
?>
    <div class="lg:flex max-w-6xl mx-auto py-24 px-4">
        <div class="lg:w-44 flex-shrink-0 lg:mr-16 mb-16">
            <h1 id="people-heading" class="text-5xl sm:text-7xl md:text-8xl font-black italic text-tlightblue lg:text-right uppercase lg:-rotate-90 origin-top-left relative pointer-events-none">People</h1>
            <style>
                @media(min-width:1024px){
                    #people-heading {
                        height:420px;width:420px;top:420px;left:-8px;
                    }   
                }
            </style>
            <p class="font-ss text-tlightgray text-xl leading-normal mt-6">Meet Voices’ editors, fellows and alumni.</p>
            <p class="font-black uppercase tracking-widest mt-12 mb-6 text-xs">By cohort</p>
        </div>
        <div class="w-full">
            <h2 class="font-ss font-light text-4xl sm:text-5xl mb-8 text-tblue">Fellows</h2>
            <div class="grid sm:grid-cols-2 gap-16">
                <?php
                $fellows = get_users(array("role" => "Author", "meta_key" => "program", "meta_value" => get_category_by_slug( "los-angeles-2022" )->$ID));
                foreach($fellows as $author):
                ?>
                    <div class="flex">
                        <img class="w-32 h-32 md:w-44 md:h-44 flex-shrink-0" src="<?php echo wp_get_attachment_image_url($author->get("photo")); ?>" alt="Headshot of <?php echo $author->get("display_name") ?>">
                        <div class="ml-6">
                            <h3 class="text-xl font-black uppercase text-tblue mb-1"><?php echo $author->get("display_name") ?></h3>
                            <p class="mb-5 font-ss italic text-xl text-tblue"><?php echo $author->get("org")?></p>
                            <p class="text-xs font-ss leading-normal"><?php echo $author->get("bio")?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php
get_footer();