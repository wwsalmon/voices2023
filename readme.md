# voices.aaja.org WordPress template

development
- set up wordpress in mamp
- clone this repo into wp-content > themes folder
- activate the theme in wp-admin
- run `npm run tw` to watch for tailwind
- you may need to edit php.ini (find the proper directory by running `phpinfo()`) to set max_post_size to a higher amount

required setup (in WordPress)
- Upload the theme through Appearance > Themes > Add New > Upload Theme
- Delete the default pages and posts
- Deactivate and uninstall the default plugins if your hosting provider uses them
- Install plugins
    - Classic editor
    - Classic widgets
    - ACF
    - Co-authors Plus
    - Yoast SEO
- Set permalink structure in Settings > Permalinks
    - Permalink structure: put in custom `/stories/%category%/%postname%/`
    - Optional > Category base: put `stories`
- Set favicon in Appearance > Customize > Site Identity > Site Icon. Upload `setup/favicon.png` from this repo.
- In ACF settings
    - Go to Tools > Import and import `setup/ACF_EXPORT.json` from this repo.
    - OR DO THE FOLLOWING TO SET UP MANUALLY
        - Create field group "User fields" set to display on all User Forms
        - Create field "photo", field type image, return image url
        - Create field "bio", text
        - Create field "twitter", text
        - Create field "linkedin", text
        - Create field "org", text
        - Create field "program", taxonomy / category / multi-select
        - Create field "show email publicly" / field name "showemail", true/false
- Set up footer
    - Go to Appearance > Widgets
    - Add Text widget to each footer section. Use `[linkbutton href="https://link"]Button text[/linkbutton]` for buttons
- Set up pages
    - For all pages
        - In editor, screen options => excerpts to show excerpts field, options => custom fields to show custom fields
        - Use H2 for subheds
    - Create page called "Home" and set as homepage in WordPress settings (Settings > Readings > Your homepage displays > A static page > Homepage dropdown)
        - To change homepage box and CTA, go to Appearance > Customize > Homepage box
    - Create page called "Stories" and set as posts page in WordPress settings (Settings > Readings > Your homepage displays > A static page > Posts page dropdown)
    - Create page called "About"
        - Add custom field "main" with first paragraph text `The Asian American Journalists Association’s Voices program is a rare opportunity for college students to develop reporting and leadership skills under the tutelage of industry professionals.`
        - Set featured image for banner image, i.e. `setup/about.jpeg` from this repo
        - Set custom field "tagline" for sidebar tagline text `Voices’ mission, history and impact`
        - Put in content for page. Use H2 for subheds
    - Create page called "Apply"
        - Set custom field "tagline" for sidebar tagline text `Become a fellow or editor`
        - custom fields make the box up top
            - apply_heading: `The Voices 2023 cycle is now closed for applications.`
            - apply_body: `For updates on the cohort and 2024 applications, follow Voices on Twitter and Instagram and subscribe to the AAJA newsletter using the link below.`
            - apply_button: `SUBSCRIBE TO AAJA'S NEWSLETTER`
            - apply_url: `https://www.aaja.org/news-and-resources/newsletter-archives/`
        - Put in content for page. Use H2 for subheds
    - Create page called "People"
        - Set custom field "tagline" for sidebar tagline text `Meet Voices’ editors, fellows and alumni.`
- Add categories in Posts > Categories
    - Only use this format: `City YYYY`, for example `Los Angeles 2022` or `Washington, D.C. 2023`
- Add people through WordPress Users
    - Administrators for leadership
    - Editors for editors
    - Authors for students
- Add posts
    - Screen options > excerpt, featured image to show
        - Make sure to set featured image
        - Make sure to set excerpt
        - Otherwise the template will break/look terrible
    - Use H3s for subheds
    - Only one category for program year
    - Only one tag except for "Featured" to put on frontpage/sidebar
    - Make sure publish date is in year of program
    - Add all authors
    - Put in the content
    - Do Yoast SEO when done

uploading YouTube video post
- Create new post
- Create new custom field "youtube" and paste YouTube embed URL (ex. https://www.youtube.com/embed/74sYPrYVQqE)
- Add featured image. Can get YouTube thumbnail with this cool https://youtube-thumbnail-grabber.com/
- Add content
- Add excerpt
- Add authors
- Add category and tags

uploading audio post
- Create new post
- Upload audio file in "Audio file" field. Make sure it's an MP3.
- Add content
- Add featured image
- Add excerpt
- Add authors
- Add category and tags

add story stream
- Add custom field "storystream" with unique ID samee as other posts in storystream
- Add custom field "sshed" with hed of storystream
- Add custom field "ssdek" with blurb for storystream

to make small images
- Edit image after adding => Add class => "small"

changelog
- v0.1.1 updated readme instructions, added `setup` folder and files, fixed small bugs
- v0.1.0 first release