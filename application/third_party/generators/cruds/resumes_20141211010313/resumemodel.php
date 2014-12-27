<?php	class ResumeModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('r.*');
			$this->db->from('resumes r');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'resumes', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'resumes', 
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
        'resumes', 
        getPostValuePair()
      );
		}
		public final function delete($id)
    {
      $this->db->where('resume.id', $id);
			return $this->db->delete();
    }
	}