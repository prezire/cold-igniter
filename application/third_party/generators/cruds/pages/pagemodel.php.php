<?php	class PageModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('p.*');
			$this->db->from('pages p');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			if($i->post())
			{
				$this->db->insert
				(
					'pages', 
					getPostValuePair()
				);
				return $this->read($this->db->insert_id());
			}
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'p', 
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
        'pages', 
        getPostValuePair()
      );
			return $this->db->affected_rows() > 0;
		}
		public final function delete($id)
    {
      $this->db->where('p.id', $id);
			return $this->db->delete();
    }
	}