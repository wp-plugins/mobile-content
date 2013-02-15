<?php

/*
Plugin name: Mobile Content
Version: 1.3
Description: Mobile Content allows you to choose what content is displayed depending on the device it is being viewed with, using shortcodes. <a href="http://dylanfeltus.com/mobile-content/">See the shortcodes here.</a>
Author: Dylan Feltus
Author URI: http://dylanfeltus.com
Plugin URI: http://dylanfeltus.com/mobile-content/
*/

require_once('mobile-detect.php');

$detect = new Mobile_Detect();

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
	<p>[computer]Content for only computers here[/computer]</p>
	<p>[tablet]Content for only tablets here[/tablet]</p>
	<p>[mobile]Content for only phones here[/mobile]</p>
	<p>[ios]Content for only iOS devices only here[/ios]</p>
	<p>[android]Content for only Android devices only here[/android]</p>
	<p>[bb]Content for only Blackberry devices here[/bb]</p>
	<p>[kindle]Content for only Kindle devices here[/kindle]</p>
	<p>[computer_tablet]Content for computer and tablets here[/computer_tablet]</p>
	<p>[mobile_tablet]Content for phones and tablets here[/mobile_tablet]</p>
	<p>[not_android_ios]Content for everything EXCEPT Android and iOS devices here[/not_android_ios]</p>
	<p>Retina Display shortcodes coming soon!</p>
	<br /><p>Thanks for downloading my plugin and if you need any WordPress help contact me via my website:</p>
	<p><a href="http://www.dylanfeltus.com" target="_blank">www.dylanfeltus.com</a></p></div>
	<div id="df" style="float:right;width:340px;margin-top:30px;margin-right:15px;"><a href="http://www.dylanfeltus.com" target="_blank"><img src="http://www.dylanfeltus.com/mobile-content/plugin-stuff/images/ad.png"></a><br />
	<p>If you have questions about my Graphic Design, Web Development, or Mobile Application services, then contact me at:</p>
	<h2><a href="mailto:contact@dylanfeltus.com">contact@dylanfeltus.com</a></h2> or
	<h2><a href="http://www.dylanfeltus.com" target="_blank">www.dylanfeltus.com</a></h2></div><?php
	
}

add_filter('widget_text', 'do_shortcode');

/*------ Computer only ------*/
function computer( $atts, $content = null ) {
	global $detect;
	if( ! $detect->isMobile() && ! $detect->isTablet() ) return do_shortcode($content);
}

add_shortcode("computer", "computer");

/*------ Mobile only ------*/
function mobile( $atts, $content = null ) {
	global $detect;
	if( $detect->isMobile() && ! $detect->isTablet() ) return do_shortcode($content);
}

add_shortcode("mobile", "mobile");

/*------ Tablet only ------*/
function tablet( $atts, $content = null ) {
	global $detect;
	if( $detect->isTablet() ) return do_shortcode($content);
}

add_shortcode("tablet", "tablet");

/*------ Mobile&Tablet only ------*/
function mobile_tablet( $atts, $content = null ) {
	global $detect;
	if( $detect->isTablet() || $detect->isMobile() ) return do_shortcode($content);
}

add_shortcode("mobile_tablet", "mobile_tablet");

/*------ iOS only ------*/
function ios( $atts, $content = null ) {
	global $detect;
	if( $detect->isiOS() && ! $detect->isAndroidOS() ) return do_shortcode($content);
}

add_shortcode("ios", "ios");

/*------ Android only ------*/
function android( $atts, $content = null ) {
	global $detect;
	if( $detect->isAndroidOS() && ! $detect->isiOS() ) return do_shortcode($content);
}

add_shortcode("android", "android");

/*------ BlackBerry only ------*/
function bb( $atts, $content = null ) {
	global $detect;
	if( $detect->isBlackBerry() ) return do_shortcode($content);
}

add_shortcode("bb", "bb");

/*------ Kindle only ------*/
function kindle( $atts, $content = null ) {
	global $detect;
	if( $detect->isKindle() ) return do_shortcode($content);
}

add_shortcode("kindle", "kindle");

/*------ Computer&Tablet only ------*/
function computer_tablet( $atts, $content = null ) {
	global $detect;
	if( ! $detect->isMobile() || $detect->isTablet() ) return do_shortcode($content);
}

add_shortcode("computer_tablet", "computer_tablet");

/*------ Not Android or iOS only ------*/
function not_android_ios( $atts, $content = null ) {
	global $detect;
	if( ! $detect->isAndroidOS() && ! $detect->isiOS() ) return do_shortcode($content);
}

add_shortcode("not_android_ios", "not_android_ios");

?>