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


if (!defined('SMF'))
	die('Hacking attempt...');

	/* Permission hook */
	function SimpleTwitterPermissions(&$permissionGroups, &$permissionList)
	{
		$permissionGroups['membergroup']['simple'] = array('SimpleTwitterPer');
		$permissionGroups['membergroup']['classic'] = array('SimpleTwitterPer');
		$permissionList['membergroup']['SimpleTwitterPerPost'] = array(false, 'SimpleTwitterPer', 'SimpleTwitterPer');
	}

	function SimpleTwitter($msgOptions, $topicOptions, $posterOptions)
	{
		global $modSettings, $scripturl, $sourcedir, $context, $user_info;

		/* Lets see if we are allowed to post things to twitter on this board */
		$context['SimpleTwitterPerPost'] = allowedTo('SimpleTwitterPerPost', $topicOptions['board']);

		/* Is this user banned from posting new topics to twitter? */
		if (!empty($modSettings['simple_twitter_user_denied']))
			$user_denied = explode(',', $modSettings['simple_twitter_user_denied']);

		else
			$user_denied = array();

		/* Twitter mod is disable...
		Or it's a redirect topic...
		Or one of the settings is empty...
		Or this group cannot post new topics to twitter...
		Or this user is banned from posting new topics...
		Either way... just return... */
		if (empty($modSettings['simple_twitter_enable']) || empty($modSettings['simple_twitter_oauth_token_secret']) || empty($modSettings['simple_twitter_oauth_token']) || empty($modSettings['simple_twitter_consumer_secret']) || empty($modSettings['simple_twitter_consumer_key']) || $msgOptions['icon'] == 'moved' || empty($context['SimpleTwitterPerPost']) || in_array($user_info['id'], $user_denied))
			return;

		else
		{
			/* Get the boards where the mod will NOT work. */
			if(!empty($modSettings['simple_twitter_board_enable']) && !empty($modSettings['simple_twitter_boards']))
				$boards_denied = explode(',', $modSettings['simple_twitter_boards']);
			else
				$boards_denied = array();

			if(!in_array($topicOptions['board'], $boards_denied))
			{
				$twt_message = utf8_decode($msgOptions['subject']);
				$twturl_url = $scripturl . '?topic=' . $topicOptions['id'] . '.0';
				$twt_key = empty($modSettings['simple_twitter_bit_ly_key']) ? '' : $modSettings['simple_twitter_bit_ly_key'];
				$twt_login = empty($modSettings['simple_twitter_bit_ly_username']) ? '' : $modSettings['simple_twitter_bit_ly_username'];


				/* Lets use the bit.ly API to short the url shall we? */
				if(!empty($modSettings['simple_twitter_use_bitly']) && !empty($modSettings['simple_twitter_bit_ly_username']) && !empty($modSettings['simple_twitter_bit_ly_key']) && class_exists('Bitly'))
				{
					$bitly = new Bitly("$twt_login", "$twt_key");
					$urlmin = $bitly->shorten("$twturl_url");
					$twturl = $urlmin;
				}

				else
					$twturl = $twturl_url;

				/* We need Abraham's Oauth PHP library */
				require_once($sourcedir . '/twitteroauth/twitteroauth.php');

				/* Prepare the message, very simple, will be enhanced in future releases me hopes... */
				$mensaje = $twt_message.'  '.$twturl;

				/* Lets connect with our twitter app */
				function getConnectionWithAccessToken()
				{
					global $modSettings;

					$twt_consumer_key = empty($modSettings['simple_twitter_consumer_key']) ? '' : $modSettings['simple_twitter_consumer_key'];
					$twt_consumer_secret = empty($modSettings['simple_twitter_consumer_secret']) ? '' : $modSettings['simple_twitter_consumer_secret'];
					$twt_oauth_token = empty($modSettings['simple_twitter_oauth_token']) ? '' : $modSettings['simple_twitter_oauth_token'];
					$twt_oauth_token_secret = empty($modSettings['simple_twitter_oauth_token_secret']) ? '' : $modSettings['simple_twitter_oauth_token_secret'];
					$connection = new TwitterOAuth($twt_consumer_key,$twt_consumer_secret,$twt_oauth_token,$twt_oauth_token_secret);

					return $connection;
				}

				/* Make the connection */
				$connection = getConnectionWithAccessToken();

				/* Publish the message and url on twitter! */
				$twitter = $connection->post('statuses/update', array('status' =>utf8_encode($mensaje)));
			}
		}
	}

	/* The admin part */
	function SimpleTwitterAdmin(&$admin_areas)
	{
		global $txt, $context;

		loadLanguage('SimpleTwitter');

		$admin_areas['config']['areas']['simpletwitter'] = array(
					'label' => $txt['simpletwitter_default_menu'],
					'file' => 'SimpleTwitter.php',
					'function' => 'ModifySimpleTwitterSettings',
					'icon' => 'posts.gif',
		);
	}

	/* The settings part */
	function ModifySimpleTwitterSettings($return_config = false)
	{
		global $txt, $scripturl, $context, $sourcedir;

		loadLanguage('SimpleTwitter');

		require_once($sourcedir . '/ManageServer.php');

		/* We need cURL you know... */
		if(!I_can_has_cURL())
		{
			$context['settings_post_javascript'] = '
				document.getElementById(\'simple_twitter_enable\').disabled = true;
				document.getElementById(\'simple_twitter_consumer_key\').disabled = true;
				document.getElementById(\'simple_twitter_consumer_secret\').disabled = true;
				document.getElementById(\'simple_twitter_oauth_token\').disabled = true;
				document.getElementById(\'simple_twitter_oauth_token_secret\').disabled = true;
				document.getElementById(\'simple_twitter_board_enable\').disabled = true;
				document.getElementById(\'simple_twitter_boards\').disabled = true;
				document.getElementById(\'simple_twitter_user_denied\').disabled = true;
				document.getElementById(\'simple_twitter_use_bitly\').disabled = true;
				';
			$cURL_message = $txt['simpletwitter_curl_message'];
		}

		else
			$cURL_message = '';

		$config_vars = array(
			$cURL_message,
			array('check', 'simple_twitter_enable', 'subtext' => $txt['simple_twitter_enable_sub']),
			array('text', 'simple_twitter_consumer_key', 'size' => 56, 'subtext' => $txt['simple_twitter_consumer_key_sub']),
			array('text', 'simple_twitter_consumer_secret', 'size' => 56, 'subtext' => $txt['simple_twitter_consumer_secret_sub']),
			array('text', 'simple_twitter_oauth_token', 'size' => 56, 'subtext' => $txt['simple_twitter_oauth_token_sub']),
			array('text', 'simple_twitter_oauth_token_secret', 'size' => 56, 'subtext' => $txt['simple_twitter_oauth_token_secret_sub']),
			'',
			array('check', 'simple_twitter_board_enable', 'subtext' => $txt['simple_twitter_board_enable_sub']),
			array('text', 'simple_twitter_boards', 'size' => 56, 'subtext' => $txt['simple_twitter_boards_sub']),
			array('text', 'simple_twitter_user_denied', 'size' => 56, 'subtext' => $txt['simple_twitter_user_denied_sub']),
			'',
			array('check', 'simple_twitter_use_bitly', 'subtext' => $txt['simple_twitter_use_bitly_sub'], 'onclick' => '
				document.getElementById(\'simple_twitter_bit_ly_key\').disabled = !this.checked;
				document.getElementById(\'simple_twitter_bit_ly_username\').disabled = !this.checked;
				document.getElementById(\'setting_simple_twitter_bit_ly_key\').nextSibling.nextSibling.style.color = \'\';
				document.getElementById(\'setting_simple_twitter_bit_ly_username\').nextSibling.nextSibling.style.color = \'\';
			'),
			array('text', 'simple_twitter_bit_ly_username', 'size' => 56, 'subtext' => $txt['simple_twitter_bit_ly_username_sub'], 'disabled' => 'disabled'),
			array('text', 'simple_twitter_bit_ly_key', 'size' => 56, 'subtext' => $txt['simple_twitter_bit_ly_key_sub'], 'disabled' => 'disabled'),
		);

		if ($return_config)
			return $config_vars;

		$context['post_url'] = $scripturl . '?action=admin;area=simpletwitter;save';
		$context['settings_title'] = $txt['simpletwitter_default_menu'];
		$context['page_title'] = $txt['simpletwitter_default_menu'];
		$context['sub_template'] = 'show_settings';

		/* Saving? */
		if (isset($_GET['save']))
		{
			/* Safety first! */
			if (!empty($_POST['simple_twitter_user_denied']))
			{
				$simple_twitter_user_denieds = explode(',', preg_replace('/[^0-9,]/', '', $_POST['simple_twitter_user_denied']));

				foreach ($simple_twitter_user_denieds as $key => $value)
					if ($value == '')
						unset($simple_twitter_user_denieds[$key]);

				$_POST['simple_twitter_user_denied'] = implode(',',$simple_twitter_user_denieds);
			}

			if (!empty($_POST['simple_twitter_boards']))
			{
				$simple_twitter_boards = explode(',', preg_replace('/[^0-9,]/', '', $_POST['simple_twitter_boards']));

				foreach ($simple_twitter_boards as $key => $value)
					if ($value == '')
						unset($simple_twitter_boards[$key]);

				$_POST['simple_twitter_boards'] = implode(',',$simple_twitter_boards);
			}

			checkSession();
			saveDBSettings($config_vars);
			writeLog();
			redirectexit('action=admin;area=simpletwitter');
		}

		prepareDBSettingContext($config_vars);
	}

	/* DUH! WINNING! */
	function SimpleTwitter_who()
	{
		$MAS = '<a href="http://missallsunday.com" title="Free SMF Mods">Simple Twitter mod &copy; Suki</a>';

		return $MAS;
	}

	if (!function_exists('I_can_has_cURL')):
		function I_can_has_cURL()
		{
			if (function_exists('curl_init'))
				return true;

			else
				return false;
		}
	endif;

	class Bitly
	{
		var $path;
		var $user;
		var $key;

		function Bitly ($_user, $_key)
		{
			$this->path = "http://api.bit.ly/v3/";
			$this->user = trim($_user);
			$this->key = trim($_key);
		}

		function shorten($url)
		{
			/* Requires a function in a source file far far away... */
			global $sourcedir;
			require_once($sourcedir .'/Subs-Package.php');

			$temp = $this->path.'shorten?login='.$this->user.'&apiKey='.$this->key.'&uri='.$url.'&format=txt';

			/* Attempts to fetch data from a URL, regardless of PHP's allow_url_fopen setting */
			$data = fetch_web_data($temp);

			if($data == null)
				$data = $url;

			return $data;
		}

	}

	/* Luego el tiempo, aquel momento
	en que mi mundo se paraba entre tus labios.
	solo para revivir,
	derretirme una vez mas mirando tus ojos negros. */
