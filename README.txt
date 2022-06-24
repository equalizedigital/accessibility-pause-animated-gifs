=== Accessibility Pause Animated GIFs ===
Contributors: equalizedigital, alh0319, stevejonesdev
Tags: accessibility, accessible, GIF, wcag, ada, annimated GIF, a11y, section 508
Requires at least: 5.0.0
Tested up to: 6.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Adds a pause button to animated GIFs so that they will be compliant with WCAG Success Criterion 2.2.2 Pause, Stop, Hide (Level A)

== Description ==

Web Content Accessibility Guidelines (WCAG) [Success Criterion 2.2.2 Pause, Stop, Hide (Level A)](https://www.w3.org/WAI/WCAG21/Understanding/pause-stop-hide.html) specifies that any moving, blinking or scrolling information that (1) starts automatically, (2) lasts more than five seconds, and (3) is presented in parallel with other content, must have a mechanism for users to pause, stop, or hide it unless the movement is part of an activity where it is essential. Animated GIFs are not essentional and thus need to have a method for the user to stop them from playing.

This plugin helps websites become more accessible and better meet WCAG guidelines by adding a pause button to all animated GIFs automatically. When the pause button is engaged with, the img src on the gif will be swapped out with an JPG that has the same file name (so long as one is present in the media library). Pressing play again will replace the JPG with the animated GIF, which simulates being able to play and pause the GIF.

There are no settings in this plugin, but to make it work, you must add a jpg image with the same file name in your media library. I.e. animated-gif-123.gif will be replaced by animated-gif-123.jpg.

This plugin was inspired by code snippets from [Chris Coyier](https://css-tricks.com/pause-gif-details-summary/) and [Steve Faulkner](https://codepen.io/stevef/pen/ExPdNMM).

== Installation ==

Getting started with Accessibility Pause Animated GIFs is as easy as installing and activating the plugin, and uploading JPG files with the same file name as your animated GIFs. In the future, we plan to generate these for you.  

### Installing Accessibility Pause Animated GIFs Within WordPress
1. Visit the plugins page within your dashboard and select ‘Add New’.
2. Search for ‘Accessibility Pause Animated GIFs’;
3. On the Accessibility Pause Animated GIFs plugin, click the 'Install' button.
4. Activate Accessibility Pause Animated GIFs from your Plugins page.

### Installing Accessibility Pause Animated GIFs Manually

1.Upload the unzipped ‘accessibility-pause-animated-gifs’ folder to the /wp-content/plugins/ directory on your website via FTP.
2. Activate Accessibility Pause Animated GIFs from your Plugins page.

### Create replacement JPG files
Currently you must upload a JPG image with the same file name in your media library inorder for this plugin to work. I.e. If your animated GIF has a file name of animated-gif-123.gif you need to have a file called animated-gif-123.jpg in your media library so there is something to replace the GIF with when the pause button is clicked.

== Frequently Asked Questions ==

= Is this compatible with the block editor or the classic editor or page builder XYZ? =
Yes. No matter how you're creating your content, this plugin will work. It uses javascript to identify the GIFs and insert the pause/play button so it doesn't matter what tool you used to build out your content.

= Can I style the pause button? =
Yes. You can use the class '.apag-image .apag-button' to target the button and chnage it's colors, size, or location. If you change the colors don't forget to ensure that you have appropriate [color contrast](https://webaim.org/resources/contrastchecker/) with your new colors and the background.

= Does this plugin make my website accessible? =
This plugin can help to make your website *more accessible* by fixing a common issue, however it alone will not make your website accessible. True accessibility requires manual and automated testing and a human being making fixes in the website. While problems can be resolved with an automated tool such as this, not all accessibility problems can be identified automatically. [Learn more about how to test your website for accessibility errors](https://equalizedigital.com/accessibility-checker/how-to-manually-check-your-website-for-accessibility/)

* If you need help identifying accessibility problems on your website try [Equalize Digital Accessibility Checker](https://equalizedigital.com/accessibility-checker/?utm_source=APAG-plugin-readme)


== Screenshots ==

1. Coming soon

== Changelog ==

= 1.0.0 =
* Everything is new and shiny.
* We think it's awesome you want to make your website more accessible.
