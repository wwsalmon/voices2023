<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, target-densityDpi=device-dpi' name='viewport'/>
    <title><?php echo wp_get_document_title(); ?></title>
<?php
date_default_timezone_set("America/New_York");
wp_head();
if (get_theme_mod("topbar-apply")) {
    $leftItem = "Donate";
    $leftLink = "https://aaja-official.salsalabs.org/donate-programs/index.html";
    $cta = "Apply now";
    $ctaLink = home_url("/apply");
} else {
    $leftItem = "Apply";
    $leftLink = home_url("/apply");
    $cta = "Support Voices";
    $ctaLink = "https://aaja-official.salsalabs.org/donate-programs/index.html";
}
?>
</head>
<body>
    <div class="sticky top-0 left-0 right-0 z-10">
        <div class="h-2 md:h-[10px] bg-tpurple w-full"></div>
        <div class="h-16 md:h-20 w-full flex items-center bg-white relative">
            <button class="lg:hidden block ml-4 text-lg opacity-50 hover:opacity-100" id="bars"><i class="fa-solid fa-bars"></i></button>
            <div class="lg:flex items-center h-full hidden">
                <a href="https://aaja.org/" class="block h-full px-4 mr-4 flex items-center justify-center opacity-80 hover:opacity-100 bg-gray-100">
                    <img src="<?php echo get_template_directory_uri() . '/img/aaja.jpg'; ?>" alt="AAJA logo" class="grayscale h-9 mix-blend-multiply">
                </a>
                <a href="<?php echo home_url("/about")?>" class="font-semibold mx-4">About</a>
                <a href="<?php echo home_url("/people")?>" class="font-semibold mx-4">People</a>
                <a href="<?php echo $leftLink; ?>" class="font-semibold mx-4"><?php echo $leftItem; ?></a>
            </div>
            <a href="<?php echo home_url() ?>" class="absolute left-1/2 top-4 md:top-5 transform -translate-x-1/2">
                <img src="<?php echo get_template_directory_uri() . '/img/voices.png'; ?>" class="h-8 md:h-9" alt="">
            </a>
            <div class="sm:hidden mr-4 ml-auto flex items-center">

            </div>
            <div class="hidden sm:flex items-center ml-auto mr-4">
                <div class="hidden lg:block relative" id="dropdown">
                    <a href="<?php echo home_url("/stories") ?>" class="font-black mx-4">Student work <i class="fa-solid fa-caret-down ml-2"></i></a>
                    <div id="dropdown-child" class="hidden absolute bg-white top-6 right-4 rounded shadow-lg whitespace-nowrap">
                        <?php
                        $categories = get_sorted_categories();
                        foreach($categories as $category): ?>
                            <a href="<?php echo get_category_link($category->term_id) ?>" class="px-4 py-2 block hover:bg-gray-100"><?php echo $category->name ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <style>
                    #dropdown:hover #dropdown-child {
                        display: block;
                    }
                </style>
                <a href="<?php echo $ctaLink; ?>" class="block px-3 h-10 flex items-center justify-center uppercase bg-tred font-semibold text-white">
                    <?php echo $cta; ?>
                </a>
            </div>
        </div>
    </div>
    <div class="fixed top-0 left-0 bottom-0 w-64 bg-white z-20 shadow-lg overflow-y-auto lg:hidden hidden" id="mobile-menu">
        <div class="p-4">
            <button class="mb-8 mt-3" id="exit"><i class="fa-solid fa-xmark"></i></button>
            <a href="https://aaja.org/" class="h-16 mb-8 relative block">
                <img src="<?php echo get_template_directory_uri() . '/img/aaja.jpg'; ?>" alt="AAJA logo" class="grayscale h-full mix-blend-multiply">
            </a>
            <a href="<?php echo home_url("/about")?>" class="font-semibold mb-8 block">About</a>
            <a href="<?php echo home_url("/people")?>" class="font-semibold mb-8 block">People</a>
            <a href="<?php echo $leftLink; ?>" class="font-semibold mb-8 block"><?php echo $leftItem; ?></a>
            <a href="" class="font-black mb-8 block">Student work</a>
            <button id="cohort-button" class="block mb-8 font-semibold">By cohort  <i class="fa-solid fa-caret-down ml-2 text-tlightgray"></i></button>
            <div id="cohort-menu" class="hidden">
                <?php foreach($categories as $category): ?>
                    <a href="<?php echo get_category_link($category->term_id) ?>" class="font-semibold pl-4 mb-8 block hover:bg-gray-100"><?php echo $category->name ?></a>
                <?php endforeach; ?>
            </div>
            <a href="<?php echo $ctaLink?>" class="block px-3 h-10 inline-flex items-center justify-center uppercase bg-tred text-white">
                <?php echo $cta;?>
            </a>
        </div>
    </div>
    <script>
const menu = document.getElementById("mobile-menu");
const bars = document.getElementById("bars");
const exit = document.getElementById("exit");

function toggleMenu() {
    menu.classList.toggle("hidden");
}

bars.onclick = toggleMenu;
exit.onclick = toggleMenu;

const cohort = document.getElementById("cohort-button");
const cohortMenu = document.getElementById("cohort-menu")

function toggleCohorts() {
    cohortMenu.classList.toggle("hidden");
}

cohort.onclick = toggleCohorts;
    </script>