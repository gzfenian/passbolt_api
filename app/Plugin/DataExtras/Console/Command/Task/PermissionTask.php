<?php
/**
 * Insert Permission Task.
 * This is a temporary file that replaces the permissions on group and categories.
 * This is following the decision to scale down the number of features for the release.
 *
 * @copyright    copyright 2012 Passbolt.com
 * @license      http://www.passbolt.com/license
 * @package      app.plugins.DataExtras.Console.Command.Task.PermissionTask
 * @since        version 2.12.11
 */

require_once(APP_DIR . DS  . 'Plugin' . DS . 'DataExtras' . DS . 'Console' . DS . 'Command' . DS . 'Task' . DS . 'ModelTask.php');

App::uses('Permission', 'Model');

class PermissionTask extends ModelTask {

	public $model = 'Permission';

	protected function getData() {
		$this->Resource = ClassRegistry::init('Resource');
		$UserTask = $this->Tasks->load('Data.User');
		$users = $UserTask::getAlias();

		$permissions = array(
			'mng' => array(
				'facebook account' => PermissionType::ADMIN,
				'bank password' => PermissionType::ADMIN,
				'salesforce account' => PermissionType::ADMIN,
				'tetris license' => PermissionType::ADMIN,
				'shared resource' => PermissionType::ADMIN,
			),
			'utt' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'tst' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'ins' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'dar' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'rem' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'aur' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'myr' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'ism' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'kev' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'ced' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'fra' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'jea' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'usr' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),
			'au1' => array(
				'facebook account' => PermissionType::READ,
				'salesforce account' => PermissionType::READ,
				'tetris license' => PermissionType::UPDATE,
				'shared resource' => PermissionType::ADMIN,
			),

		);

		$ps = array();

		// Give access to 4 passwords to each user.
		foreach($permissions as $userAlias => $perms) {
			foreach($perms as $resourceName => $permissionType) {
				$resource = $this->Resource->findByName($resourceName);
				$ps[] = array('Permission' => array(
					'id' => Common::uuid(),
					'aco' => 'Resource',
					'aco_foreign_key' => $resource['Resource']['id'],
					'aro' => 'User',
					'aro_foreign_key' => $users[$userAlias],
					'type' => $permissionType
				));
			}
		}

		return $ps;
	}
}