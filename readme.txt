=== Scrawl ===
Contributors: automattic
Donate link:
Tags: light, gray, white, custom-background, custom-menu, flexible-header, featured-images, editor-style, post-formats, one-column, rtl-language-support, theme-options, sticky-post, translation-ready, fixed-layout, responsive-layout
Tested up to: 4.2
Stable tag: 3.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Scrawl is based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc.

== Description ==

A clean, responsive theme for long-form writing, with bold featured images, fancy image captions and pull quotes, and plenty of space for your content to shine. A slide-out sidebar provides ready access to all your secondary content, including social links, custom menu, and widgets.

== Licenses ==

* Genericons from genericons.com, SIL Open Font license

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

== Where can I add a Custom Menu? ==

Scrawl includes a custom menu in the slide-out sidebar, accessed by clicking the menu icon (three horizontal lines) in the upper right corner of the theme. Add widgets under Customize -> Menus.

== Where can I add widgets? ==

Scrawl includes a widget area in a slide-out sidebar, accessed by clicking the menu icon (three horizontal lines) in the upper right corner of the theme. Add widgets under Customize -> Widgets.

== Does Scrawl use Featured Images? ==

If a Featured Image is set for a post, it will display full-screen above the post content on single posts.

== How can I add a site logo? == 

Brand your site and make it yours with Jetpack (http://jetpack.me) by including your business' logo; navigate to Customize → Site Title and upload a logo image in the space provided. The logo will appear next to your site title in the header at a maximum height of 150px.

== How can I add links to my social networks? == 

You can add links to a multitude of social services in the slide-out menu, using the following steps:

1. Create a new Custom Menu, and assign it to the Social Links menu location.
2. Add links to each of your social services using the Links panel.
3. Icons for your social links will appear in the slide-out menu.

= Quick Specs (all measurements in pixels) =

* The main column width is 700.
* The sidebar width is 344.
* Featured Images for single posts are 2000 by 1500
* The site logo appears at a maximum width of 120 and height of 40 in the site header, and a maximum width of 354 and height of 200 in the slide-out sidebar.

== Changelog ==

= 22 September 2015 =
* Add JavaScript to return window to previous scroll position after closing menu -- fixed #3283. Adjust CSS for menu to fix z-index issue in IE9.

= 8 September 2015 =
* Make sure Gravatar image in the header doesn't display the hovercard.

= 28 August 2015 =
* Removed conditional for post format template tag.

= 31 July 2015 =
* Remove .`screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 15 July 2015 =
* Always use https when loading Google Fonts.

= 16 June 2015 =
* Add .bypostauthor class for submission to .org

= 15 June 2015 =
* Updating version number for regenerated download

= 9 June 2015 =
* Escape translation strings;

= 6 May 2015 =
* Fully remove example.html from Genericons folders.
* Remove index.html file from Genericions.

= 8 April 2015 =
* Set a height for the secondary-meta-entry based on the genericon-edit height.

= 6 April 2015 =
* Update readme and version number for .org

= 24 March 2015 =
* Set visibility to hidden for the slide menu when not open to improve accessibility

= 20 March 2015 =
* Update error in readme about logo size

= 19 March 2015 =
* Make menu-toggle selector more specific; it was interfering with the Gist shortcode/embed.
* Reduce right margins on nested lists
* New readme in preparation for .org submission; allow long links to break
* Ensure text in drop-down menus is readable when included in widgets
* Improve display of Nero ratings
* Ensure embeds, iframes, and objects have bottom margins
* Add function to toggle aria-expanded attr on/off for accessibility

= 18 March 2015 =
* Set correct default background color

= 16 March 2015 =
* Ensure horizontal scrollbars are not displayed, and vertical scrollbars are not displayed when there is no content below the fold
* Style scrollbars to match theme for webkit
* Ensure scrollbar is styled to match the theme when scrollbars are always enabled

= 15 March 2015 =
* Use the correct function to pull the image source, so it gets displayed at the desired image size
* Ensure we're loading the correct featured image handle to avoid loading full-size images
* Ensure scrawl_featured_header can be overridden by a child theme
* Add webkit support for transforms
* Ensure nested lists nest in widgets
* Update wpcom $themecolors to match theme
* Add screenshot
* Hide horizontal overflow on the slide-out sidebar
* Left-align table headings
* Fixes for transitions; need commas between multiple transitions
* Simplify transitions/transforms to remove unnecessary prefixed properties

= 13 March 2015 =
* Add RTL styles; tweaks to page-title line-height; add .intro class to editor styles
* Ensure form-allowed-tags are legible on mobile devices
* Increase padding on table cells/headings
* Add titles to links with icons for clarity; set minimum height on site branding so hiding both header text and logo/gravatar don't break the layout; begin adding ToC to stylesheet
* Don't force site title to be lowercase; let users choose.

= 11 March 2015 =
* Begin adding editor styles; load tiled gallery wrapper when the DOM is ready rather than on window load
* Display a sticky post icon for sticky posts
* Add POT file
* Update description in style.css
* More adjustments to tags
* Update tags in style.css; minor change to widget area link colors; remove custom headers support
* Improvements to outdented large images, galleries, and videos; style older posts button
* Rework comment entry meta/edit links; didn't like the circles with icons. Style more WP.com-specific elements to better match the theme.

= 10 March 2015 =
* Combine media queries for simplicity; preventDefault on new double-click function
* Allow double-click outside sidebar area to close the open menu
* Refinements for buttons and inputs on password/search/not-found pages; refinements for colors and styles on WP.com
* Ensure infinite footer area fades out when sliding sidebar is open
* Adjust styles for audio player and slideshow to better match theme; fixes for menu toggle placement depending on screen size; adjust media query to coincide with point at which WP.com admin bar changes height.
* Remove unnecessary prefixed transitions/transforms; style buttons; begin fixing placement of menu toggle
* Move social links into main toggle menu area; update button styles
* Outdent large responsive videos; tweaks to menu bar that probably break it, I'll fix later.

= 9 March 2015 =
* More style tweaks
* Small fixes for WP.com-specific styles; rename Sidebar to Slide-Out Sidebar for accuracy; allow Gravatar to be used as site logo; minor style tweaks
* Remove trailing whitespace
* Initial commit to repo
