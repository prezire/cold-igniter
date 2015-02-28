<?php	
	class FileModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('f.*');
			$this->db->from('files f');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'files', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
	      return $this->db->get_where
	      (
	        'files', 
	        array('id' => $id)
	      );
		}
		public final function uploadFilename($fileId)
	    {
	      //TODO: Query and remove prev image file.
	      $filename = upload('filename');
	      if(isset($filename))
	      {
	        $a = array('filename' => $filename['file_name']);
	        $this->db->where('id', $id);
	        $this->db->update('files', $a);
	      }
	    }
		public final function update()
		{
			$i = $this->input;
			$id = $i->post('id');
			$this->db->where('id', $id);
			$this->db->update
			(
				'files', 
				getPostValuePair()
			);
		}
		public final function delete($id)
	    {
	    	$this->db->where('id', $id);
			return $this->db->delete('files');
	    }
	}