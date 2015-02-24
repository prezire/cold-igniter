<?php	class UserModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('u.*');
			$this->db->from('users u');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'users', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
	      return $this->db->get_where
	      (
	        'users', 
	        array('id' => $id)
	      );
		}
		public final function update()
		{
			$i = $this->input;
			$a = getPostValuePair();
			$a['enabled'] =	$i->post('enabled') ? 1 : 0;
			$id = $i->post('id');
			$this->db->where('id', $id);
			$this->db->update('users', $a);
		}
		public final function delete($id)
    {
      $this->db->where('user.id', $id);
			return $this->db->delete();
    }
	}