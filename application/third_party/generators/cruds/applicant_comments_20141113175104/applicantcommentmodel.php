<?php	class ApplicantCommentModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('a.*');
			$this->db->from('applicant_comments a');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			if($i->post())
			{
				$this->db->insert
				(
					'applicant_comments', 
					getPostValuePair()
				);
				return $this->read($this->db->insert_id());
			}
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'applicant_comments', 
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
        'applicant_comments', 
        getPostValuePair()
      );
		}
		public final function delete($id)
    {
      $this->db->where('applicant_comment.id', $id);
			return $this->db->delete();
    }
	}