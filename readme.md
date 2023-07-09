# voices.aaja.org WordPress template

development
- set up wordpress in mamp
- clone this repo into wp-content > themes folder
- activate the theme in wp-admin
- run `npm run tw` to watch for tailwind
- if you make new .php files, add to `tailwind.config.js`

required setup (in WordPress)
- Create page called "Home" and set as homepage in WordPress settings (Settings > Readings > Your homepage displays > A static page > Home)
- Create page called "Apply" (linked in footer and has custom template)
- Create page called "People" (linked in header and has custom template)
- Install plugin co-authors plus

posts
- categories: "[city name] [year]", i.e. "Los Angeles 2022". only one category per post.
- tags: investigative, feature, audio, etc. only one tag per post.
- screen options => excerpts to show excerpts field
- make sure to upload featured image
- use H3 for subheds

pages
- enable "custom fields" in editor (Screen options > Custom fields)
- add custom field: "tagline" with desired tagline