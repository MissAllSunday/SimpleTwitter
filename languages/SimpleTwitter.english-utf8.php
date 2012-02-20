<?php

/**
 * @package Simple Twitter mod
 * @version 1.2
 * @author Jessica González <missallsunday@simplemachines.org>
 * @copyright Copyright (c) 2011, Jessica González
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

/*
 * Version: MPL 1.1
 *
 * The contents of this file are subject to the Mozilla Public License Version
 * 1.1 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
 * for the specific language governing rights and limitations under the
 * License.
 *
 * The Original Code is http://missallsunday.com code.
 *
 * The Initial Developer of the Original Code is
 * Jessica González.
 * Portions created by the Initial Developer are Copyright (C) 2011
 * the Initial Developer. All Rights Reserved.
 *
 * Contributor(s):
 *
 */

global $txt, $helptxt;

$txt['simpletwitter_curl_message'] = '<span style="color:red;">This mod needs cURL library installed on your server, if you don not have this installed the mod will not work, contact your hosting provider and ask if cURL library can be installed.</span>';
$txt['simpletwitter_default_menu'] = 'SimpleTwitter';
$txt['simple_twitter_enable'] = 'Enable the SimpleTwitter mod.';
$txt['simple_twitter_enable_sub'] = 'Click on the help icon to see how register an app on twitter.';
$txt['simple_twitter_use_bitly'] = 'Use the bit.ly API to short the url?';
$txt['simple_twitter_use_bitly_sub'] = 'Click on the help icon to see how to get a username and key from bit.ly<br/>this is optional, you must check this and set the username and key, otherwise it will show your standard url.';
$txt['simple_twitter_bit_ly_username'] = 'Put your bit.ly username here:';
$txt['simple_twitter_bit_ly_username_sub'] = 'This is optional, is you enable the bit.ly setting and you do not set a username the short url won\'t work.';
$txt['simple_twitter_bit_ly_key'] = 'Put your bit.ly key here:';
$txt['simple_twitter_bit_ly_key_sub'] = 'This is optional, is you enable the bit.ly setting and you do not set a key the short url won\'t work.';
$txt['simple_twitter_boards'] = 'Put the board\'s ID where you DO NOT want this mod to work.';
$txt['simple_twitter_boards_sub'] = 'IDs only, example: 1,2,3,4.';
$txt['simple_twitter_user_denied'] = 'Put the user\'s ID that will not be able to Post new Topics to twitter.';
$txt['simple_twitter_user_denied_sub'] = 'IDs only, example: 1,2,3,4, this will overwrite the group permission, so even if an user is on a group that can send new topics to twitter, the user will not be able to do so.';
$txt['simple_twitter_consumer_key'] = 'Put your twitter consumer key here:';
$txt['simple_twitter_consumer_key_sub'] = 'you will get this once you register an app on twitter.';
$txt['simple_twitter_consumer_secret'] = 'Put your twitter consumer secret here:';
$txt['simple_twitter_consumer_secret_sub'] = 'You will get this once you register an app on twitter, do not reveal this.';
$txt['simple_twitter_oauth_token'] = 'Put your oauth token here:';
$txt['simple_twitter_oauth_token_sub'] = 'You will get this once you register an app on twitter, do not reveal this.';
$txt['simple_twitter_oauth_token_secret'] = 'Put your oauth token secret here:';
$txt['simple_twitter_oauth_token_secret_sub'] = 'You will get this once you register an app on twitter, do not reveal this.';
$txt['simple_twitter_board_enable'] = 'Check to define the boards where this mod <span style="font-weight:bold; color:red; font-size:14;">will not work</span>';
$txt['simple_twitter_board_enable_sub'] = 'This is optional, leave in blank to post tweets from every board, this is useful if you have admin only or members only type of boards and you do not want to make the topics go public.';

	/* Help strings */
$helptxt['simple_twitter_enable'] = 'In order to use this mod, you have to create an app on twitter, first, go to:  <a href="http://dev.twitter.com/apps" target="blank">Client Applications page</a>, sign in with your twitter username and password,  click on Register a new application, fill out all the requested fields: <br />
	-Application Name:  this is important, whatever you put in here will appear on every tweet:  via:myforum_name<br />
	-Application URL:  your forum url<br />
	-Application Type:  check the "Client" option<br/>
	- Default Access type:  check the "Read & Write" option <br/>
	- Application Icon: the icon for the app, can be edited later.<br/>
	<p /> once you register your app, now you can see your Consumer key
 and Consumer secret. <p />   to get your token access, clik on "My acces Token"  tab.   you will get your auth token and oauth token secret  do not reveal those.';
 $helptxt['simple_twitter_use_bitly'] = 'in order to use the bit.ly shorter API you need to register an account on <a href="http://bit.ly/" target="blank">bit.ly</a>  then clik here: <a href="http://bit.ly/a/your_api_key" target="blank">Get your API key</a> and you will get your username and key.';
 
	/* Permission strings */
$txt['permissiongroup_SimpleTwitterPer'] = 'Simple Twitter mod permissions';
$txt['permissiongroup_simple_SimpleTwitterPer'] = 'Simple Twitter mod permissions';
$txt['permissionname_SimpleTwitterPerPost'] = 'Post new topics to Twitter.'; 

