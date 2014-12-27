<?php class PrivilegeModel extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public final function index() {
		$this->db->select( 'p.*' );
		$this->db->from( 'privileges p' );
		return $this->db->get();
	}
	public final function create() {
		$i = $this->input;
		$this->db->insert
		(
			'privileges',
			getPostValuePair()
		);
		return $this->read( $this->db->insert_id() );
	}
	public final function readIsPrivileged($userId, $privilegeNames)
	{
		$this->db->select('p.name');
		$this->db->from('privileges p');
		$this->db->join('role_privileges rp', 'rp.privilege_id = p.id');
		$this->db->join('roles r', 'r.id = rp.role_id');
		$this->db->join('users u', 'u.role_id = r.id');
		$this->db->where('u.id', $userId);
		return $this->db->get();
	}
	public final function readPrivilegeDetailsByUserId($userId)
	{
		$this->db->select('p.*');
		$this->db->from('privileges p');
		//@param    right    Include all privileges so 
		//admin can choose whether or not to enable it per user.
		$this->db->join('role_privileges rp', 'rp.privilege_id = p.id', 'right');
		$this->db->join('roles r', 'rp.role_id = r.id');
		$this->db->join('users u', 'u.role_id = r.id');
		$this->db->where('u.id', $userId);
		$aPrivileges = $this->db->get()->result();
		//
		$l = array();
		foreach($aPrivileges as $priv)
		{
			$this->db->select('p.*, pp.selected');
			$this->db->from('permissions p');
			$this->db->join('privilege_permissions pp', 'pp.permission_id = p.id');
			$this->db->join('role_privileges rp', 'rp.id = pp.role_privilege_id');
			$this->db->join('privileges pv', 'pv.id = rp.privilege_id');
			$this->db->where('pv.id', $priv->id);
			$this->db->where('rp.user_id', $userId);
			$oPermissions = $this->db->get()->result();
			//
			$aPrivs = array
			(
				'privilege' => $priv, 
				'permissions' => $oPermissions
			);
			array_push($l, $aPrivs);
		}
		return $l;
	}
	public final function read( $id ) {
		return $this->db->get_where
		(
			'privileges',
			array( 'id' => $id )
		);
	}
	public final function update() {
		$i = $this->input;
		$id = $i->post( 'id' );
		$this->db->where( 'id', $id );
		$this->db->update
		(
			'privileges',
			getPostValuePair()
		);
	}
	public final function delete( $id ) {
		$this->db->where( 'privilege.id', $id );
		return $this->db->delete();
	}
}
