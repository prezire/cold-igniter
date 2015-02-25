<?php	class CompanyEmployeeModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('c.*');
			$this->db->from('company_employees c');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'company_employees', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'company_employees', 
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
        'company_employees', 
        getPostValuePair()
      );
		}
		public final function delete($id)
    {
      $this->db->where('company_employee.id', $id);
			return $this->db->delete();
    }
	}