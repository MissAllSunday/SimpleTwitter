<?php

/**
 * @package Simple Twitter mod
 * @version 1.2
 * @author Jessica Gonz�lez <missallsunday@simplemachines.org>
 * @copyright Copyright (c) 2011, Jessica Gonz�lez
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
 * Jessica Gonz�lez.
 * Portions created by the Initial Developer are Copyright (C) 2011
 * the Initial Developer. All Rights Reserved.
 *
 * Contributor(s):
 *
 */

	/* If for some reason you want to run this file manually, let's load almighty SSI.php for you */
	if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
		require_once(dirname(__FILE__) . '/SSI.php');

	elseif (!defined('SMF'))
		exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

	$hooks = array(
		'integrate_pre_include' => '$sourcedir/SimpleTwitter.php',
		'integrate_create_topic' => 'SimpleTwitter',
		'integrate_admin_areas' => 'SimpleTwitterAdmin',
		'integrate_load_permissions' =>'SimpleTwitterPermissions',
	);

	/* We are installing... ORLY? */
	$call = 'add_integration_function';

	foreach ($hooks as $hook => $function)
		$call($hook, $function);

