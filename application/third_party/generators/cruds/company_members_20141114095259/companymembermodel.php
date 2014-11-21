<?php	class CompanyMemberModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('c.*');
			$this->db->from('company_members c');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			if($i->post())
			{
				$this->db->insert
				(
					'company_members', 
					getPostValuePair()
				);
				return $this->read($this->db->insert_id());
			}
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'company_members', 
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
        'company_members', 
        getPostValuePair()
      );
		}
		public final function delete($id)
    {
      $this->db->where('company_member.id', $id);
			return $this->db->delete();
    }
	}