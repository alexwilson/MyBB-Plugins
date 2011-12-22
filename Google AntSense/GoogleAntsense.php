<?php
/* This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://sam.zoy.org/wtfpl/COPYING for more details. */
if(!defined("IN_MYBB")) {
	die("You cannot access this file directly.");
}

$plugins->add_hook("pre_output_page", "GoogleAntsense_display");

function GoogleAntsense_display($output) {
	global $mybb;
	if(!$mybb->usergroup['cancp']) {
		$adsense = '<script type="text/javascript">
		<!--
		google_ad_client = "ca-pub-8582254754174665";
		google_ad_slot = "9115096618";
		google_ad_width = 468;
		google_ad_height = 60;
		//--></script>
		<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>';
		$output = str_replace("<div id=\"debug\">", "<div id=\"debug\">$adsense", $output);
	}
	return $output;
}

function GoogleAntsense_info() {
	return array(
		"name" => "GoogleAntsense",
		"description" => "Displays google adsense in the debug section of the footer",
		"website" => "http://antoligy.com/",
		"author" => "Alex \"Antoligy\" Wilson",
		"authorsite" => "http://antoligy.com/",
		"version" => "1.0",
		"guid" => "",
		"combatibility" => "16*"
	);
}
?>
