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

$txt['simpletwitter_curl_message'] = '<span style="color:red;">Este mod encesita la librería cURL instalada en tu servidor, si no está instalada, el mod no funcionarái, contácta a tu provedor de hosting y pregunta si pueden instalar esa librería.</span>';
$txt['simpletwitter_default_menu'] = 'SimpleTwitter';
$txt['simple_twitter_enable'] = 'Activar el mod SimpleTwitter.';
$txt['simple_twitter_enable_sub'] = 'Clic en el ícono de ayuda para ver más información sobre como registrar una app en twitter.';
$txt['simple_twitter_use_bitly'] = '¿Usar la API de bit.ly par acortar las urls?';
$txt['simple_twitter_use_bitly_sub'] = 'Clic en el ícono de ayuda para saber como obtenet tu nombre de usuario y tu key de bit.ly<br/>Esto es opcional, si activas esta opción debes de poner un nombre de usauario y una key de lo contrario esta opción NO funcionará.';
$txt['simple_twitter_bit_ly_username'] = 'Pon tu nombre de usuario de bit.ly you :';
$txt['simple_twitter_bit_ly_username_sub'] = 'Esto es opcional, si activas esta opción y no pones un nombre de usuario, esta opción no funcionará.';
$txt['simple_twitter_bit_ly_key'] = 'Pon tu key de bit.ly you :';
$txt['simple_twitter_bit_ly_key_sub'] = 'Esto es opcional, si activas esta opción y no pones una key, esta opción no funcionará.';
$txt['simple_twitter_boards'] = 'Pon las IDs de los foros donde este mod NO tendrá efecto.';
$txt['simple_twitter_boards_sub'] = 'IDs solamente, separadas por commas, ejemplo: 1,2,3,4';
$txt['simple_twitter_user_denied'] = 'Pon you  los IDs de los usuarios que no podrán crear nuevos temas en twitter.';
$txt['simple_twitter_user_denied_sub'] = 'IDs solamente, separados por coma, ejemplo: 1,2,3,4, esto va a sobreescribir los permisos que tenga este usuario, si el o los usuarios están en un grupo que puede crear nuevos temas, aún así, este usuario no podrá hacerlo.';
$txt['simple_twitter_consumer_key'] = 'Pon tu twitter consumer key you :';
$txt['simple_twitter_consumer_key_sub'] = 'Obtienes esto después de registrar una app on twitter.';
$txt['simple_twitter_consumer_secret'] = 'Pon tu twitter consumer secret you :';
$txt['simple_twitter_consumer_secret_sub'] = 'Obtienes esto después de registrar una app on twitter.';
$txt['simple_twitter_oauth_token'] = 'Pon tu oauth token aquí:';
$txt['simple_twitter_oauth_token_sub'] = 'Obtienes esto después de registrar una app on twitter.';
$txt['simple_twitter_oauth_token_secret'] = 'Put your oauth token secret aquí:';
$txt['simple_twitter_oauth_token_secret_sub'] = 'Obtienes esto después de registrar una app on twitter, no reveles esto.';
$txt['simple_twitter_board_enable'] = 'Marca esta casilla para definir los foros en los cuales este mod <span style="font-weight:bold; color:red; font-size:14;">no tendrá efecto</span>';
$txt['simple_twitter_board_enable_sub'] = 'Esto es opcional, déjalo en blanco para postear temas a twitter desde cualquier foro, esta caracteristica es util si tu tienes foros privados los cuales no deseas hacer publico su contenido.';

	/* Help strings */
$helptxt['simple_twitter_enable'] = 'Para poder usar este mod, es necesario crear una app en twitter, primero, ve a:  <a href="http://dev.twitter.com/apps" target="blank">Client Applications page</a>, logéate con tu usuario y contraseña de twitter,  clic en Register a new application, llena los campos necesarios: <br />
	-Application Name:  esto e simportante, lo que sea que pongas aquí, aparecerá en cada tweet:  via:myforum_name<br />
	-Application URL:  la url de tu foro<br />
	-Application Type:  marca la opción "Client"<br/>
	- Default Access type:  marca la opción "Read & Write"<br/>
	- Application Icon: el ícono para la app, puede editarse después.<br/>
	<p /> una vez que terminaste de registrar tu app,ya podrás ver tu Consumer key
 y Consumer secret. <p />   para obtener tu token access, clic en "My acces Token".   obtendrás tu auth token y oauth token secret  no reveles esta info.';
 $helptxt['simple_twitter_use_bitly'] = 'Para poder usar esta opción necesitas registrar una cuenta en <a href="http://bit.ly/" target="blank">bit.ly</a> luego entra aquí: <a href="http://bit.ly/a/your_api_key" target="blank">Get your API key</a> y obtendrás tu nombre de usuario y tu key.';
 
	/* Permission strings */
$txt['permissiongroup_SimpleTwitterPer'] = 'Simple Twitter mod permisos';
$txt['permissiongroup_simple_SimpleTwitterPer'] = 'Simple Twitter mod permisos';
$txt['permissionname_SimpleTwitterPerPost'] = 'Postear nuevos temas en Twitter.'; 

