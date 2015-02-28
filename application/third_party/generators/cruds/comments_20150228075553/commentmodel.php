<?php	
	class CommentModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('c.*');
			$this->db->from('comments c');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'comments', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
	      return $this->db->get_where
	      (
	        'comments', 
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
				'comments', 
				getPostValuePair()
			);
		}
		public final function delete($id)
	    {
	    	$this->db->where('id', $id);
			return $this->db->delete('comments');
	    }
	}