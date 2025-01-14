<?php
	if(file_exists("../../settings.php")) { require_once("../../settings.php"); }
	@header("Content-type: text/css", true);
	if(!isset($x_css_color)) { $x_css_color = "red"; }
?>
	/*	__________ ____ ___  ___________________.___  _________ ___ ___  
	\______   \    |   \/  _____/\_   _____/|   |/   _____//   |   \ 
	 |    |  _/    |   /   \  ___ |    __)  |   |\_____  \/    ~    \
	 |    |   \    |  /\    \_\  \|     \   |   |/        \    Y    /
	 |______  /______/  \______  /\___  /   |___/_______  /\___|_  / 
			\/                 \/     \/                \/       \/ CSS Elements	*/

/* ################################################################################################################################## */
/* Main Areas XFP Related
/* ################################################################################################################################## */
	body { background: #1b1b1b; color: #ffffff; font-family: xfpfont; font-size: 14px; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; }
	h1 { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); font-size: 22px; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; }
	h2 { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); font-size: 20px; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; color: <?php echo $x_css_color; ?>; }
	h3 { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); font-size: 18px; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; }
	
	div#xfp_footer { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; width: 100%; 
		position: fixed; bottom: 0px; left: 0px; color: lightgrey; text-align: center; background: #161616; padding-top: 10px; padding-bottom: 10px; 
		font-size: 12px; vertical-align: middle; 
		z-index: 90 !important; }
	
	a { color: <?php echo $x_css_color; ?>; text-decoration: none; font-weight: 700; }
	a:hover { color: #ffffff; }
	a:focus, a:active { color: yellow; outline: none; }

	div#xfp_content { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; 
		box-sizing: border-box; position: absolute; width: 100%; top: 0px; left: 0px; 
		padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; font-size: 16px; padding-left: 250px; margin-top: 60px; padding-bottom: 60px;
		z-index: 0 !important; }	
	
	@media (max-width: 900px)  { div#xfp_content { padding-left: 0px; } }	
	@media (max-height: 500px) { div#xfp_content { padding-left: 0px; } }	
	
/* ################################################################################################################################## */
/* Top Header Lines XFP Related
/* ################################################################################################################################## */
	div#xfp_headline {  -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; 
		position: fixed; top: 0; left: 0; width: 100vw; min-width: 100vw; max-width: 100vw; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;
		background: #161616; font-size: 24px; font-weight: 700; height: 60px; max-height: 60px; min-height: 60px; text-align: center; 
		z-index: 100 !important; }

	div#xfp_headline h1 { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; 
		word-break: keep-all; font-size: 24px; white-space: pre; color: <?php echo $x_css_color; ?>; margin-top: -3px; }

	#xfp_headline_extender { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; 
		color: #ffffff;font-weight: bold;font-size: 14px;position: fixed; width: 100%; text-align: center; top: 35px; left: 0px;margin-top: -3px; }
	
	#xfp_headline_h2 { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; 
		font-size: 14px; font-weight: bold; color: #ffffff; }

	@media (max-width: 900px), (max-height: 500px) { #xfp_headline { margin-left: 65px !important; text-align: left !important; } #xfp_headline, #xfp_headline_h2, #xfp_headline_extender { text-align: left !important; } #xfp_headline_extender { padding-left: 15px;} #xfp_headline h1 { padding-left: 15px;}}
	
/* ################################################################################################################################## */
/* Navigation Elements
/* ################################################################################################################################## */
	#xfp_searchboxtop { margin-top: 2px !important; border-radius: 0 !important; padding-top: none !important; z-index: 200 !important; margin-bottom: 25px; width: 100%; }
	#xfp_navwrapper { position: fixed; top: 0; left: 0; width: 250px; background: #161616; height: 100vh; margin: 0; padding: 0; z-index: 0 !important; }
	.xfp_navlinksec { padding-left: 40px; }
	.xfp_navlinksecsec { padding-left: 60px; }
	#xfp_menutopbar { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); position: fixed; top: 0; left: 0; margin: 0; padding: 0; height: 60px; background: <?php echo $x_css_color; ?>; width: 60px; z-index: 50; }
	#xfp_menutopbar img { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); background: <?php echo $x_css_color; ?>; position: fixed !important; width: 55px; display: none; z-index: 150 !important; padding: 5px; }
	div#xfp_navigation { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); position: absolute; font-size: 16px; width: 250px; height: auto; background: #161616; z-index: 150 !important; margin: 0; margin-top: 60px; }
	div#xfp_navigation div.xfp_navlink { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); font-weight: 700; font-size: 22px; color: #fff; min-width: 100% !important; width: 20%; padding-left: 20px; z-index: 50; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
	div#xfp_navigation .xfp_navlinksec, div#xfp_navigation .xfp_navlinksecsec { color: #fff;  }
	div#xfp_navigation .xfp_navlinksec:hover, div#xfp_navigation .xfp_navlinksecsec:hover,div#xfp_navigation div.xfp_navlink:hover { color: #000; background: <?php echo $x_css_color; ?>; }
	#xfp_navactive div.xfp_navlink { color: <?php echo $x_css_color; ?> ; background: #040404 !important; }
	@media (max-width: 900px), (max-height: 500px) {
		.xfp_navlinksecsec { display: block !important; }
		.xfp_navlinksec { display: block !important; }
		#xfp_navwrapper { background: 0 0; }
		#xfp_menutopbar img { display: block; }
		div#xfp_navigation { position: fixed; overflow-y: scroll; display: none; width: 250px; margin-top: 60px; height: 50vh; padding-bottom: 25px; }
		#xfp_menutopbar img:hover { background: #161616; }
		#xfp_menutopbar img:hover + div#xfp_navigation, #xfp_menutopbar:hover div#xfp_navigation { display: block !important; }
	}
	a#xfp_navactive, a#xfp_navactive div { color: <?php echo $x_css_color; ?> !important;  background: #040404 !important; }
	a#xfp_navactive1 { color: grey !important; }
	#xfp_cenetermenueimg:hover { background: white !important; }
	#xfp_cenetermenueimgexit { margin-left: 150px; position: absolute; top: 0; left: 0; display: none; }
	div#xfp_navigation { position: relative !important; }
	#xfp_scrollnavi {  margin: 0 0 0 0; padding: 0 0 0 0; margin-top: -20px; }
	@media (min-width: 900px) and (max-height: 900px) { .xfp_navlinksecsec { display: none; } }
	@media (min-width: 900px) and (max-height: 750px) { .xfp_navlinksec { display: none; } }

/* ################################################################################################################################## */
/* Inputs and Buttons
/* ################################################################################################################################## */
	input[type="text"], input[type="password"], textarea, .xfp_primary_button, .xfp_secondary_button { 
		-webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; 
		box-sizing: border-box; border: none; outline: none !important;
		height: 50px; border-radius: 8px;
		margin: 0px 0px 0px 0px; font-size: 16px; 
		font-family: xfpfont; text-align: left;
		padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px; 
		background: #1b1b1b; color: #ffffff; resize: none; border: 3px solid #161616; }
	
	textarea { min-height: 250px; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px;outline: none !important; }
	
	input[type="submit"], input[type="button"], button { 
		-webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; 
		box-sizing: border-box; border: none; outline: none !important;
		color: #000000; height: 50px; border-radius: 8px; margin: 0px 0px 0px 0px; font-size: 16px; 
		background: <?php echo $x_css_color; ?>; border: 3px solid #161616; }	
	
	input[type="submit"]:hover, button:hover , input[type="button"]:hover { background: #161616; color: <?php echo $x_css_color; ?>; border: 3px solid <?php echo $x_css_color; ?>; }	
	input[type="text"]:hover, input[type="password"]:hover, textarea:hover {  background: #161616; border: 3px solid <?php echo $x_css_color; ?>; }
	input[type="text"]:active, input[type="password"]:active, textarea:active, input[type="text"]:focus, input[type="password"]:focus, textarea:focus {  background: #1b1b1b; border: 3px solid <?php echo $x_css_color; ?>; }
	
	.xfp_secondary_button { background: #1b1b1b; }
	
/* ################################################################################################################################## */
/* Back Link Top Button XFP Related
/* ################################################################################################################################## */
	#xfp_top_but_3 { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); background: #1C1C1C; width: 50px; margin: 0 !important; padding: 0 !important; height: 30px !important; font-size: 13px; text-align: center; position: fixed; top: 60px; z-index: 25; color: white !important; right: 100px; text-align: center !important; vertical-align: middle !important;  border-bottom: 2px solid #000; border-left: 2px solid #000; border-top: none; margin-right: 50px; cursor: pointer;}
	#xfp_top_but_2 { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); background: #1C1C1C; width: 50px; margin: 0 !important; padding: 0 !important; height: 30px !important; font-size: 13px; text-align: center; position: fixed; top: 60px; z-index: 25; color: white !important; right: 50px; text-align: center !important; vertical-align: middle !important;  border-bottom: 2px solid #000; border-left: 2px solid #000; border-top: none; margin-right: 50px; }
	#xfp_top_but_1 { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); background: #1C1C1C; width: 50px; margin: 0 !important; padding: 0 !important; height: 30px !important; font-size: 13px; text-align: center; position: fixed; top: 60px; z-index: 25; color: white !important; right: 0; text-align: center !important; vertical-align: middle !important;  border-bottom: 2px solid #000; border-left: 2px solid #000; border-top: none; }
	#xfp_top_but_1:hover, #xfp_top_but_2:hover, #xfp_top_but_3:hover  { color: #000 !important; }
	
/* ################################################################################################################################## */
/* Restricted Pages
/* ################################################################################################################################## */
	.xfp_sec_site_return { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); position: fixed;
		top: 0px; color: <?php echo $x_css_color; ?>;left: 0px; background: #242424;
		padding: 10px;padding-bottom: 2px;padding-top: 2px;border-bottom-right-radius: 15px;
		z-index: 1000;font-size: 18px;
		border-bottom: 2px solid #1b1b1b ;border-right: 2px solid #1b1b1b ; }

	.xfp_sec_site_return:hover { color: grey !important; }

	.xfp_smallsite .xfp_content_box_text, .xfp_smallsite .xfp_content_box_text { max-width: 1000px; margin: auto; margin-bottom: 15px; }
	.xfp_smallsite .xfp_content_box_text:first-of-type, .xfp_smallsite .xfp_content_box_text:first-of-type { margin-top: 35px; }	
	.xfp_smallsite .xfp_content_box_text:last-of-type, .xfp_smallsite .xfp_content_box_text:last-of-type { margin-bottom: 65px; }	
	
/* ################################################################################################################################## */
/* Segment Areas
/* ################################################################################################################################## */		
	.xfp_link_box_hover div  { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; font-size: 16px; color: white; 
		background: #161616; border: 3px solid #121212;padding: 15px; margin-bottom: 15px; border-radius: 15px; float: left; 
		margin-right: 15px;-webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); z-index: 150; }
	.xfp_link_box_hover div:hover  { border: 3px solid <?php echo $x_css_color; ?>; background: #121212; color: <?php echo $x_css_color; ?>; }
	.xfp_link_box_hover h3  { padding: 0 0 0 0; margin: 0 0 0 0; font-size: 16px; }			
	
	.xfp_content_box_text, .x_comment_comments_post, .x_comment_vote, .x_comment_form {
		-webkit-transform: translate3d(0, 0, 0); 
		transform: translate3d(0, 0, 0);	
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box; 
		box-sizing: border-box; 
		background: #121212;
		border-radius: 12px;
		color: white;
		padding: 15px;
		margin: 10px;
		margin-top: 15px;
		margin-left: 2%;
		margin-right: 2%;
		border: 2px solid #121212;
	}
	.xfp_content_box_text .xfp_content_box_text {
		margin-top: 0px;
		margin-left: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		padding-bottom: 0px;
	}
	
	.xfp_content_box_hover:hover {
		color: <?php echo $x_css_color; ?>;
		border: 2px solid <?php echo $x_css_color; ?>;
	}
	
	.xfp_content_box_text_title, .x_comment_comments_title {
		-webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; 
		width: 100%; top: 0px; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; padding-left: 15px; background: #080808; border-top-left-radius: 12px; border-top-right-radius: 12px; font-size: 16px; font-weight: bold;
		padding-top: 4p;padding-bottom: 5px;font-size: 16px;}
	.xfp_content_box_text_title h3 { margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; }
	
	.xfp_content_box_header { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; 			
		background: #080808; border-radius: 12px;
		text-align: center;
		margin-left: 2%;
		margin-right: 2%;
		margin-bottom: 10px;
		margin-top: 10px;
		padding-top: 4px;
		padding-bottom: 4px;
	}
	
	.xfp_content_box_text_error, #x_eventBox_error { background; red; }
	.xfp_content_box_text_error .content_box_text_title { background: red; }

	.xfp_content_box_text_ok, #x_eventBox_ok { background; red; }
	.xfp_content_box_text_ok .content_box_text_title { background: red; }

	.xfp_content_box_text_warning, #x_eventBox_warn { background; yellow; }
	.xfp_content_box_text_warning .content_box_text_title { background: yellow; }
	
	.xfp_content_box_text_notify { background; blue; }
	.xfp_content_box_text_notify .content_box_text_title { background: blue; }
	
	.xfp_accent { color: <?php echo $x_css_color; ?>; }
	
	/* ################################################################## */
	/* Style for x_library cookiebanner function
	/* ################################################################## */
	.x_cookieBanner { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-box-sizing: border-box; -moz-box-sizing: border-box; 
		box-sizing: border-box; background-color: rgba(255, 20, 20, 0.95); color: #ccc; line-height: 26px; 
		font-family: Arial; display: block; position: fixed;font-size: 16px; bottom: 10vh; right: 0; color: #ffffff; 
		width: 200px; border-top-left-radius: 10px; border-bottom-left-radius: 10px; padding: 20px;
		z-index: 600; }
	.x_cookieBanner a { color: #000000; text-decoration: none; font-weight: bold; }
	.x_cookieBanner a:hover { color: #ffffff; }	
	.x_cookieBanner input.x_cookieBanner_close { background-color: #1b1b1b; color: #fff; display: inline-block; border: none !important; width: 100% !important; border-color: #fff !important; 
		border-radius: 10px !important; cursor: pointer; height: 40px !important; font-size: 13px !important; font-family: Arial !important; font-weight: 700 !important; padding-top: 5px; padding-bottom: 5px; }
	.x_cookieBanner input.x_cookieBanner_close:hover { background-color: #121212; }
	
/* ################################################################################################################################## */
/* Event Windows
/* ################################################################################################################################## */
	.x_eventBox { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); position: fixed; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; top: 0px; left: 0px; width: 100vw; height: 100vh; background: rgba(0,0,0,0.7); z-index: 85 !important;	}
	.x_eventBox_inner { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); position: absolute; min-width: 200px; background: #242424;	max-width: 80vw;
		  left: 50%;
		  top: 40%;
		  -webkit-transform: translate(-50%, -40%);
		  transform: translate(-50%, -40%);
		  z-index: 95 !important;
		  padding: 15px;
		  border-radius: 8px;
		  font-size:16px;
	}
	
	.x_eventBoxButton { background: #121212; color: white; border-radius: 10px; border: 1px solid black; position: absolute; right: 15px; top: 15px; }
	.x_eventBoxButton:hover { background: #ffffff; color: black; border-radius: 10px; border: 1px solid black; }
	
	#x_eventBox_error { border: 3px solid red; }
	#x_eventBox_ok { background; red; }
	#x_eventBox_ok { background; red; }