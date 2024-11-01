=== Shortlinks ===
Plugin Name: Shortlinks
Contributors: aizatto
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=aizat%2efaiz%40gmail%2ecom&lc=MY&item_name=Ezwan%20Aizat%20Bin%20Abdullah%20Faiz&item_number=Shortlinks&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Author: Ezwan Aizat Bin ABdullah Faiz
Tags: post, posts, page, pages, category, categories, tag, tags, taxonomy, taxonomies, custom post type, custom post types, shortlinks, permalinks
Requires at least: 3
Tested up to: 3
Stable tag: 0.1

== Description ==

Shortlinks allows you to easily retrieve the shortlink for your WordPress posts, pages, categories, post_tags, attachments, custom post types, and custom taxonmies.

By default, WordPress uses links a query string ( ie: http://blog.aizatto.com/?page_id=3565 ) to load up your posts, pages, categories, etc. But when you enable permalinks, the query string is hidden by the WordPress rewrite rules. Having pretty urls is great, but also makes the website less flexible. For example, changing a posts published date will change the URL.

While we can't control how other people will link to our site, we can control how we link to our internal sites.

By default, with permalinks enabled, when visiting WordPress with a shortlink, WordPress will redirect you to the permalink URL.

== How It Works ==

Shortlinks hooks into the WordPress filter `get_shortlink` to enable shortlinks for all WordPress types.

You can use Shortlinks in your own theme or plugin.

To return the shortlink for a post, page, or custom post type, where $id represents the ID:
  <?php echo wp_get_shortlink($id, 'post'); ?>

To return the shortlink for a category, where $id represents the category id:
  <?php echo wp_get_shortlink($id, 'category'); ?>

To return the shortlinks for custom taxonomy, where $id represents the term id, and $taxonomy represents the custom taxonomy:
  <?php echo wp_get_shortlink($id, $taxonomy); ?>

== Installation ==

1. Upload the `shortlinks` folder into your plugin directory.
1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Easily get shortlinks for posts
1. Easily get shortlinks for pages
1. Easily get shortlinks for a single page
1. Easily get shortlinks for categories

== Why I Created It ==

WordPress supports shortlinks by default, but only allows the user to get the shortlink for a post. Finding it unacceptable, I created a plugin to get shortlinks for all content types.

== Changelog ==

= 0.1 =
* Initial version
