=== Iesay Social Sharing===
Contributors: 99839
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=99839@163.com&item_name=Friends+of+the+Park&item_number=Fall+Cleanup+Campaign&amount=5%2e00&currency_code=USD
Tags: social, social sharing, buttons
Requires at least: 3.7
Tested up to: 4.9.5
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds very simple social sharing buttons for Twitter, Facebook, QQ, Weibo and Google+ to the end of your posts.

== Description ==

= Iesay Social Sharing=

The simplest sharing links possible for Twitter, Facebook, QQ, Weibo and Google+.

Most social sharing plugins are too ugly, heavy, complicated or poorly coded for my liking. This plugin aims to be different. Simple, lightweight and flexible.

= No script dependencies =

From itself, the buttons are actually plain text links which require <strong>NO external scripts</strong>. It makes no sense to load over 50 kilobytes of scripts and styles for a functionality 95% of your users will not use.

= Simple yet pretty & user-friendly  =

You can have the plugin load two very small files to add icons and a pop-up functionality to the sharing links. This way, users do not have to leave your website after clicking a sharing option. Loading of both files can be disabled so you can craft your own styles.

**Plugin Features**

- Sharing links for Twitter, Facebook, QQ, Weibo and Google+
- Simple icon styles with a hover effect
- Simple script of just 600 bytes (not jQuery dependent) which will make the links open in a pop-up window.
- A shortcode and a template function to display the buttons anywhere you want.
- An overridable filter to set the condition for when to display the sharing links.
- Translation ready

== Frequently Asked Questions ==

= Can I display the sharing buttons using a shortcode? =

Yes, you can use the following shortcode (eg. inside posts or pages).

`
[ie_social_sharing]
`

= Can I display the sharing buttons using a template function? =
Yes, you can use the following PHP function from your template files.


`
<?php echo ie_social_sharing(); ?>
`

= I want more control over when to show the sharing options =

Use the `iesay_display` filter to show the links in more places.

*Example 1: will add the sharing links to everything possible*

`
add_filter('iesay_display', '__return_true');
`

*Example 2: will add the sharing links to all single posts, pages and other post types.*

`
function my_display_condition() {
	return is_singular();
}

add_filter('iesay_display', 'my_display_condition');
`

== Screenshots ==

1. Simple but beautiful sharing links add the end of your posts.
2. Disable the default plugin CSS to create your own styles.
2. The settings page of the plugin.

== Installation ==

= Installing the plugin =

1. Alternatively, download the plugin and upload the contents of `social-sharing.zip` to your plugins directory, which usually is `/wp-content/plugins/`.
1. Activate the plugin.

== Changelog ==

#### 1.0.0 - April 12, 2018 

- Initial release.

