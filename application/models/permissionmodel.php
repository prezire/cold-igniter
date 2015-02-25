<?php
	class PermissionModel extends CI_Model 
	{
		public function __construct()
		{
			//
		}
		public final function index()
		{
			return $this->db->get('permissions');
		}
		public final function create()
		{
			$this->db->insert('permissions', getPostValuePair());
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
			return $this->db->get_where('permissions', array('id' => $id));
		}
		public final function readUserPermissions()
		{
			$this->db->select
			(
				'*, 
				u.id user_id, 
				r.id role_id, 
				r.name role_name'
			);
			$this->db->from('users u');
			$this->db->join('roles r', 'u.role_id = r.id');
			$users = $this->db->get()->result();
			$aUsers = array();
			foreach($users as $u)
			{
				$aUser = array
				(
					'id' => $u->user_id,
					'full_name' => $u->full_name,
					'role' => $u->role_name
				);
				//
				$aUser['privileges'] = array();
				/*$this->db->select('pv.*');
				$this->db->from('privileges pv');
				$this->db->join
				(
					'privilege_permissions pp', 
					'pp.privilege_id = pv.id'
				);
				$this->db->group_by('pv.id');
				$this->db->where('pp.user_id', $u->user_id);
				$privileges = $this->db->get()->result();*/
				$privileges = $this->db->get('privileges')->result();
				foreach($privileges as $pv)
				{
					$aPrivilege = array
					(
						'id' => $pv->id, 
						'name' => $pv->name,
						'checked' => $this->hasPrivilege($u->user_id, $pv->id)
					);
					//
					$this->db->select('pm.*');
					$this->db->from('permissions pm');
					$this->db->join
					(
						'privilege_permissions pp', 
						'pp.permission_id = pm.id'
					);
					$this->db->where('pp.user_id', $u->user_id);
					$this->db->where('pp.privilege_id', $pv->id);
					$permissions = $this->db->get()->result();
					//
					$aPrivilege['permissions'] = array();
					foreach($permissions as $pp)
					{
						$aPermission = array
						(
							'id' => $pp->id, 
							'name' => $pp->name
						);
						array_push($aPrivilege['permissions'], $aPermission);
					}
					array_push($aUser['privileges'], $aPrivilege);
				}
				array_push($aUsers, $aUser);
			}
			return array('users' => $aUsers);
		}
		public final function readHasPrivilege($privilegeName)
		{
			$pId = $this->db->get_where
			(
				'privileges', 
				array('name' => $privilegeName)
			)->row()->id;
			$uId = getLoggedUser()->id;
			return $this->hasPrivilege($uId, $pId);
		}
		public final function readHasPermissions
		(
			$privilegeName, 
			$permissions = array('Create', 'Read', 'Update', 'Delete')
		)
		{
			$bPriv = $this->readHasPrivilege($privilegeName);
			$i = 0;
			$aPerms = $this->db->get('permissions')->result();
			foreach($aPerms as $ap)
			{
				foreach($permissions as $p)
				{
					if(p == $ap->name)
					{
						$i++;
						break;
					}
				}
			}
			$bPerm = count($permissions) == $i;
			return $bPerm && $bPriv;
		}
		private final function hasPrivilege($userId, $privilegeId)
		{
			$bHasPriv = $this->db->get_where
			(
				'privilege_permissions pp', 
				array
				(
					'pp.user_id' => $userId,
					'pp.privilege_id' => $privilegeId
				)
			)->num_rows() > 0;
			return $bHasPriv;
		}
		public final function updateUserPrivilege
		(
			$userId,
			$privilegeId, 
			$selected
		)
		{
			$selected = $selected == 'true';
			$b = 0;
			if($selected)
			{
				$this->db->select('permission_id');
				$this->db->from('privilege_permissions');
				$this->db->where('privilege_id', $privilegeId);
				$existingPerms = $this->db->get()->result_array();
				//
				//Insert along with all permissions.
				$this->db->select('id');
				$this->db->from('permissions');
				$perms = $this->db->get()->result_array();
				foreach($perms as $p)
				{
					if(!in_array($p['id'], $existingPerms))
					{
						{
							$a = array
							(
								'user_id' => $userId,
								'privilege_id' => $privilegeId,
								'permission_id' => $p['id']
							);
							$this->db->insert('privilege_permissions', $a);
						}
					}
				}
				return $this->db->affected_rows() > 0;
			}
			else
			{
				$bHasPriv = $this->hasPrivilege($userId, $privilegeId);
				if($bHasPriv)
				{
					//Remove including related permissions.
					$this->db->where('user_id', $userId);
					$this->db->where('privilege_id', $privilegeId);
					$this->db->delete('privilege_permissions');
					return $this->db->affected_rows() > 0;
				}
			}
			return true;
		}
		public final function updateUserPermission
		(
			$userId,
			$privilegeId, 
			$permissionId,
			$selected
		)
		{
			$selected = $selected == 'true';
			$a = array
			(
				'user_id' => $userId,
				'privilege_id' => $privilegeId,
				'permission_id' => $permissionId
			);
			$exists = $this->db->get_where
			(
				'privilege_permissions', 
				$a
			)->num_rows() > 0;
			if($selected)
			{

				if($exists)
				{
					//Do nothing.
				}
				else
				{
					//Create.
					$this->db->insert('privilege_permissions', $a);
				}
				return $this->db->affected_rows() > 0;
			}
			else
			{
				if($exists)
				{
					//Remove.
					$this->db->delete('privilege_permissions', $a);
				}
				else
				{
					//Do nothing.
				}
				return $this->db->affected_rows() > 0;
			}
			return true;
		}
		public final function update()
		{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('permissions', getPostValuePair(array('id')));
			return $this->db->affected_rows() > 0;
		}
		public final function delete($id)
		{
			$this->db->delete('permissions', array('id' => $id));
		}
	}
