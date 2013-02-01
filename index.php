<?php

/*
Plugin name: Mobile Content
Version: 1.0
Description: Mobile Content allows you to choose what content is displayed depending on the device it is being viewed with, using shortcodes. <a href="http://dylanfeltus.com/mobile-content/">See the shortcodes here.</a>
Author: Dylan Feltus
Author URI: http://dylanfeltus.com
Plugin URI: http://dylanfeltus.com/mobile-content/
*/

/*------ Admin Panel ------*/
add_action('admin_menu', 'basicPluginMenu');

function basicPluginMenu() {
	
	$appName = 'Mobile Content';
	$appID = 'mobile-content';
	add_menu_page($appName, $appName, 'administrator', $appID . '-top-level', 'pluginAdminScreen');
	
}

function pluginAdminScreen() {
	?>
	<div style="float:left;width:50%;margin-top:5px;"><h1>About Mobile Content</h1>
	<p>Mobile Content plugin allows you to use shortcodes to display different content, in your posts or pages, depending on the device it is being viewed on. Using these shortcodes you can specify to only show certain content to desktops, tablets, or mobile phones. </p>
	<br /><h2>Shortcodes:</h2>
	<p>[desktop]Your Desktop Content Here[/desktop]</p>
	<p>[tablet]Your Tablet Content Here[/tablet]</p>
	<p>[mobile]Your Mobile Content Here[/mobile]</p>
	<p>Retina Display, iOS, and Android shortcodes coming soon!</p>
	<br /><p>Thanks for downloading my plugin and if you need any WordPress help contact me via my website:</p>
	<p><a href="http://www.dylanfeltus.com" target="_blank">www.dylanfeltus.com</a></p></div>
	<div id="df" style="float:right;width:340px;margin-top:30px;margin-right:15px;"><a href="http://www.dylanfeltus.com" target="_blank"><img src="http://www.dylanfeltus.com/mobile-content/plugin-stuff/images/ad.png"></a><br />
	<p>If you need any Graphic Design, Web Development, or Mobile Application work done contact me at:</p>
	<h2><a href="mailto:contact@dylanfeltus.com">contact@dylanfeltus.com</a></h2> or
	<h2><a href="http://www.dylanfeltus.com" target="_blank">www.dylanfeltus.com</a></h2></div><?php
	
}


/*------ Desktop View ------*/
function desktop( $atts, $content = null ) {
	return '<div class="mobile-content-desktop">'.$content.'</div>';
}


add_shortcode("desktop", "desktop");

/*------ Mobile View ------*/
function mobile( $atts, $content = null ) {
	return '<div class="mobile-content-mobile">'.$content.'</div>';
}


add_shortcode("mobile", "mobile");

/*------ Tablet View ------*/
function tablet( $atts, $content = null ) {
	return '<div class="mobile-content-tablet">'.$content.'</div>';
}


add_shortcode("tablet", "tablet");


/*------ Enable CSS ------*/
function wptuts_styles_with_the_lot()
{
	// Register the style like this for a plugin:
	wp_register_style( 'mobile-content', plugins_url( '/css/style.css', __FILE__ ), array(), '20120208', 'all' );

	// For either a plugin or a theme, you can then enqueue the style:
	wp_enqueue_style( 'mobile-content' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_styles_with_the_lot' );



?>