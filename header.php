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
    <div class="sticky top-0 left-0 right-0">
        <div class="h-[10px] bg-tpurple w-full"></div>
        <div class="h-20 w-full flex items-center bg-white relative">
            <div class="flex items-center h-full">
                <a href="https://aaja.org/" class="block h-full px-4 mr-4 flex items-center justify-center opacity-80 hover:opacity-100 bg-gray-100">
                    <img src="<?php echo get_template_directory_uri() . '/img/aaja.jpg'; ?>" alt="AAJA logo" class="grayscale h-9 mix-blend-multiply">
                </a>
                <a href="" class="font-semibold mx-4">About</a>
                <a href="" class="font-semibold mx-4">People</a>
                <a href="" class="font-semibold mx-4">Donate</a>
            </div>
            <a href="" class="absolute left-1/2 top-5 transform -translate-x-1/2">
                <img src="<?php echo get_template_directory_uri() . '/img/voices.png'; ?>" class="h-9" alt="">
            </a>
            <div class="flex items-center ml-auto mr-4">
                <div class="dropdown">
                    <a href="" class="font-black mx-4">Student work ▾</a>
                </div>
                <a href="" class="block px-3 h-10 flex items-center justify-center uppercase bg-tred font-semibold text-white">
                    Apply now
                </a>
            </div>
        </div>
    </div>