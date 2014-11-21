<?php	class OrganizationMemberModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('o.*');
			$this->db->from('organization_members o');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			if($i->post())
			{
				$this->db->insert
				(
					'organization_members', 
					getPostValuePair()
				);
				return $this->read($this->db->insert_id());
			}
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'organization_members', 
        array('id' => $id)
      );
		}
		public final function update()
		{
			$i = $this->input;
			$id = $i->post('id');
			$this->db->where('id', $id);
			$this->db->update
      (
        'organization_members', 
        getPostValuePair()
      );
		}
		public final function delete($id)
    {
      $this->db->where('organization_member.id', $id);
			return $this->db->delete();
    }
	}