<?php get_header();
?>
    <div class="w-full sm:flex items-stretch">
        <img src="<?php echo get_template_directory_uri() . '/img/hero.jpg'; ?>" alt="Photo of Voices fellow standing against AAJA backdrop onstage" class="sm:w-2/5 object-cover block">
        <div class="sm:w-3/5">
            <div class="max-w-2xl ml-4 mr-4 sm:ml-8 md:ml-16 sm:py-24 py-12">
                <p class="text-4xl md:text-5xl font-ss mb-8 md:mb-16" style="line-height: 1.2">
                    <span class="font-light">Learn reporting from veteran journalists at the</span> <i>Los Angeles Times</i>, <i>Associated Press</i><span class="font-light"> and more.</span>
                </p>
                <p class="text-lg md:text-xl leading-normal">
                    <b>AAJA Voices is a multimedia journalism fellowship for college students</b> that runs each summer, culminating in a week in-person at the national AAJA convention.
                </p>
            </div>
        </div>
    </div>
    <div class="h-[10px] bg-tyellow w-full"></div>
    <div class="w-full bg-tpurple py-24 text-white px-4">
        <div class="max-w-5xl mx-auto flex items-start">
            <div class="w-72">
                <p class="font-black text-[36px] text-tyellow mb-12 leading-tight">Add real, hard-hitting stories to your portfolio</p>
                <p class="text-xl leading-normal mb-12">30 years of impactful investigations and previously untold stories speak for themselves</p>
                <a href="" class="px-4 h-10 flex items-center text-lg justify-center uppercase bg-tyellow font-semibold block mb-32 text-tgray">
                    Read student work
                </a>
                <p class="font-black uppercase tracking-wider mb-6">By cohort</p>
                <a href="" class="opacity-50 hover:opacity-100 font-semibold my-6 block">Los Angeles 2022</a>
                <a href="" class="opacity-50 hover:opacity-100 font-semibold my-6 block">Virtual 2021</a>
                <a href="" class="opacity-50 hover:opacity-100 font-semibold my-6 block">Houston 2018</a>
                <a href="" class="opacity-50 hover:opacity-100 font-semibold my-6 block">Philadelphia 2017</a>
            </div>
        </div>
    </div>
    <div class="h-[10px] bg-tblue w-full"></div>
    <div class="py-24 text-center px-4">
        <p class="text-5xl font-black text-tblue mb-12">Get noticed by industry leaders</p>
        <a href="" class="px-4 h-10 inline-flex items-center text-lg justify-center uppercase bg-tblue font-semibold mb-12 text-white">
            MEET our editors, fellows and alumni
        </a>

        <img src="<?php echo get_template_directory_uri() . '/img/twitter.jpg'; ?>" alt="Screenshots of tweets from industry leaders praising Voices student work" class="w-full">
    </div>
<?php
get_footer();