# Nightjar #

Nightjar is a clean photoblogging theme that combines full-screen featured images with beautiful typography to create a smooth experience for your readers. You can further personalize the theme by adding a logo, links to your social media pages, and you can also feature up to four posts on the front page.

## Compatibility Note ##

As Nightjar makes use of Flexbox, it will not work in Internet Explorer 9 or earlier. This is a deliberate decision and it will not be changing.

## Features ##

* A slide-out menu panel that also contains one widget area
* Full-screen featured images
* Customizable site logo
* A social media menu (requires [Jetpack](http://jetpack.me/))
* Up to four featured images on the front page (requires [Jetpack](http://jetpack.me/))

## Social Media Menu ##

This theme uses Jetpack's social media menu that's integrated with WordPress' custom menu system. To create a social media menu, first ensure that the module is activated and follow these steps:

1. Go to your Dashboard and then go to Appearance > Menus. Create a new menu and name it whatever you'd like.

2. Select "Links" from the accordion menu on the left (where it says "Pages", "Links", and "Categories"), and in the text boxes marked "URL", enter your URL. For example, for Twitter, you would write https://twitter.com/your-twitter-username.

3. Click the "Add to Menu" button. Repeat for every social media network you'd like to add.

4. Once your menu is created, click the "Save Menu" button, and then click on the "Manage Locations" tab near the top of the screen. Assign your newly-created menu to the "Social Media Menu" location.

### Supported Networks ###

Facebook, Twitter, Google+, Pinterest, LinkedIn, YouTube, Instagram, GitHub. Unsupported social networks appear with a generic icon.

## Custom Background ##

A post's featured image will be displayed in place of the custom background image on single post views and if the featured posts slider is being used on the home page (unless the post in question has no featured image, of course). This can be overridden by checking "Always Display Background Image" at Dashboard > Appearance > Customize > Background Image.

## A Note Regarding the Bundled Image ##

I do not know whether the bird in the bundled image is a nightjar. If it isn't, please send me a GPL-licensed image of a nightjar that's at least 2400x1200 pixels.

## Changelog ##

* Version 1.0.3, November 30, 2016
	* Removed `post-formats` tag
	* Clarified custom background implementation
	* Removed included translation
	* Now uses Jetpack's built-in social media module
	* Prefixed things that needed it and unprefixed things that didn't need it
	* Correctly reset query in `footer.php`
	* Footer now correctly appears on-screen when the admin bar is present
* Version 1.0.2
	* Fix link colors in post meta information
* Version 1.0.1, May 30, 2016
	* Updated POT file
	* Slider appears correctly when front page displays latest posts
	* Fixed some display issues when the sidebar is much longer than the page content
	* Clean up page links on multi-page posts
	* Other minor fixes
* Version 1.0.0, May 17, 2016
	* First submitted to WP.org repository
	
## Credits ##

* Nightjar itself is based on [Underscores](http://underscores.me/), which is copyright Automattic, Inc. Both Nightjar and Underscores are licensed under the [GPL, v2](http://www.gnu.org/licenses/gpl-2.0.html)
* [Normalize](http://necolas.github.io/normalize.css/) is copyright Nicolas Gallagher and Jonathan Neal, and licensed under the [MIT License](https://opensource.org/licenses/MIT)
* [Lato](https://www.google.com/fonts/specimen/Lato) is copyright Lukasz Dziedzic and licensed under the [SIL Open Font License, v1.1](http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL)
* [Alegreya](https://www.google.com/fonts/specimen/Alegreya) is copyright Huerta Tipografica and licensed under the [SIL Open Font License, v1.1](http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL)
* [Genericons](http://genericons.com/) is copyright Automattic, Inc., and licensed under the [GPL, v2](http://www.gnu.org/licenses/gpl-2.0.html)
* [ResponsiveSlides](http://responsiveslides.com/) is copyright [Viljami Salminen](http://viljamis.com/) and licensed under the [MIT license](https://opensource.org/licenses/MIT)
* The bundled image and the images in the screenshot were obtained at [Unsplash](https://unsplash.com/) and are licensed under the [CC0](http://creativecommons.org/publicdomain/zero/1.0/)
	* [Bird](https://unsplash.com/photos/ZJQMXKF_LuY)
	* [Purple Sky](https://unsplash.com/photos/yPbBYE1pkHo)
	* [Waves](https://unsplash.com/photos/n3t4fIuVzLA)
	* [Buildings](https://unsplash.com/photos/DROwSrK20nE)
	* [Snow](https://unsplash.com/photos/dqMxDqdhg_4)