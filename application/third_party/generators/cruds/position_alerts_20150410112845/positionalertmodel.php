<?php	
	class PositionAlertModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('p.*');
			$this->db->from('position_alerts p');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'position_alerts', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
	      return $this->db->get_where
	      (
	        'position_alerts', 
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
				'position_alerts', 
				getPostValuePair()
			);
		}
		public final function delete($id)
	    {
	    	$this->db->where('id', $id);
			return $this->db->delete('position_alerts');
	    }
	}