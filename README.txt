NEW TEMPLATE v1.2 GUIDE
========================
New template with Gulp JS & SASS also for online version working good plugin WP-SCSS

ACF advanced Loop - more info: https://www.advancedcustomfields.com/resources/repeater/

CPT (Custom Post Types) added functions.php

For landing page added template Home Page TPL

Bootstrap4, fullPage.js(parallax), TweenMax, jQuery, OWL, Slick, lazyload and other JS libraries included directory vendor JS & SASS by Gulp

Install node.js
https://nodejs.org/en/download/

Install gulp cli 
>npm install --global gulp-cli

Install required node packages with:
>npm install

For auto compiling:
-------------------
>gulp watch:sass
>gulp watch:scripts

Compile all scripts with
>gulp build

See folder structuring below:
BEM class naming methodology: https://en.bem.info/methodology/quick-start/
The basics for the naming structure is .block__element--modifier or in practice, something like:
<section class="page-row background--cherry">
    <article class="page-row__text page-row__text--right white-txt"></article>
</section>