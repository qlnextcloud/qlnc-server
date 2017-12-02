<?php
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Kamil Domanski <kdomanski@kdemail.net>
 * @author Lukas Reschke <lukas@statuscode.ch>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
OCP\JSON::checkAdminUser();
OCP\JSON::callCheck();

$appIds = isset($_GET['appIds']) ? (array)$_GET['appIds'] : [];
if (!count($appIds)) {
	OC_JSON::error();
	exit;
}

$app = new OC_App();
$appId = OC_App::cleanAppId($appIds[0]);
$enabled = $app->getAppEn($appId);
	
OC_JSON::success(['data'=> [ 'enable' =>$enabled]]);
