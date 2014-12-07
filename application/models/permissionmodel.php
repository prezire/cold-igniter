<?php
class PermissionModel extends CI_Model {
	//Permissions only consists of enum CRUD.
	const CREATE = 'Create';
	const READ = 'Read';
	const UPDATE = 'Update';
	const DELETE = 'Delete';
	//
	public function __construct() {
		//
	}
	/*
		SELECT * FROM users u
		INNER JOIN roles r ON u.role_id = r.id
		INNER JOIN role_privileges rp ON r.id = rp.role_id
		INNER JOIN privileges pv ON pv.id = rp.privilege_id
		INNER JOIN role_privilege_permissions rpp ON rpp.role_privilege_id = pv.id
		INNER JOIN permissions pm ON pm.id = rpp.permission_id
		WHERE u.id = 7 AND pv.name = 'User'
	*/
	public final function readPermissions
	(
		$userId,
		$privilegeName,
		$requestedPermissions
	) {
		$this->db->select( 'pm.name' );
		$this->db->from( 'users u' );
		$this->db->join( 'roles r', 'u.role_id = r.id' );
		$this->db->join( 'role_privileges rp', 'r.id = rp.role_id' );
		$this->db->join( 'privileges pv', 'pv.id = rp.privilege_id' );
		$this->db->join( 'role_privilege_permissions pp' , 'pp.role_privilege_id = rp.id' );
		$this->db->join( 'permissions pm', 'pm.id = pp.permission_id' );
		$this->db->where( 'u.id', $userId );
		$this->db->where( 'pv.name', $privilegeName );
		return $this->db->get();
	}
}
