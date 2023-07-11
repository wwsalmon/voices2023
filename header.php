<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, target-densityDpi=device-dpi' name='viewport'/>
    <title><?php echo wp_get_document_title(); ?></title>
<?php
date_default_timezone_set("America/New_York");
wp_head();
?>
</head>
<body>
    <div class="sticky top-0 left-0 right-0 z-10">
        <div class="h-2 md:h-[10px] bg-tpurple w-full"></div>
        <div class="h-16 md:h-20 w-full flex items-center bg-white relative">
            <button class="md:hidden block ml-4 text-lg opacity-50 hover:opacity-100" id="bars"><i class="fa-solid fa-bars"></i></button>
            <div class="md:flex items-center h-full hidden">
                <a href="https://aaja.org/" class="block h-full px-4 mr-4 flex items-center justify-center opacity-80 hover:opacity-100 bg-gray-100">
                    <img src="<?php echo get_template_directory_uri() . '/img/aaja.jpg'; ?>" alt="AAJA logo" class="grayscale h-9 mix-blend-multiply">
                </a>
                <a href="<?php echo home_url("/about")?>" class="font-semibold mx-4">About</a>
                <a href="<?php echo home_url("/people")?>" class="font-semibold mx-4">People</a>
                <a href="https://aaja-official.salsalabs.org/donate-programs/index.html" class="font-semibold mx-4">Donate</a>
            </div>
            <a href="<?php echo home_url() ?>" class="absolute left-1/2 top-4 md:top-5 transform -translate-x-1/2">
                <img src="<?php echo get_template_directory_uri() . '/img/voices.png'; ?>" class="h-8 md:h-9" alt="">
            </a>
            <div class="sm:hidden mr-4 ml-auto flex items-center">

            </div>
            <div class="hidden sm:flex items-center ml-auto mr-4">
                <div class="dropdown">
                    <a href="" class="font-black mx-4">Student work <i class="fa-solid fa-caret-down"></i></a>
                </div>
                <a href="<?php echo home_url("/apply")?>" class="block px-3 h-10 flex items-center justify-center uppercase bg-tred font-semibold text-white">
                    Apply now
                </a>
            </div>
        </div>
    </div>
    <div class="fixed top-0 left-0 bottom-0 w-64 bg-white z-20 shadow-lg p-4 md:hidden" id="mobile-menu">
        <button class="mb-8 mt-3" id="exit"><i class="fa-solid fa-xmark"></i></button>
        <a href="https://aaja.org/" class="h-16 mb-8 relative block">
            <img src="<?php echo get_template_directory_uri() . '/img/aaja.jpg'; ?>" alt="AAJA logo" class="grayscale h-full mix-blend-multiply">
        </a>
        <a href="<?php echo home_url("/about")?>" class="font-semibold mb-8 block">About</a>
        <a href="<?php echo home_url("/people")?>" class="font-semibold mb-8 block">People</a>
        <a href="https://aaja-official.salsalabs.org/donate-programs/index.html" class="font-semibold mb-8 block">Donate</a>
        <a href="" class="font-black mb-8 block">Student work <i class="fa-solid fa-caret-down"></i></a>
        <a href="<?php echo home_url("/apply")?>" class="block px-3 h-10 inline-flex items-center justify-center uppercase bg-tred font-semibold text-white">
            Apply now
        </a>
    </div>
    <script>
const menu = document.getElementById("mobile-menu");
const bars = document.getElementById("bars");
const exit = document.getElementById("exit");

console.log(menu, bars, exit);

function toggleMenu() {
    menu.classList.toggle("hidden");
}

bars.onclick = toggleMenu;
exit.onclick = toggleMenu;
    </script>