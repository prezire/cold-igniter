<?php 
  echo '<?php';
  $cml = camelize($entity);
  $className = $cml;
  $first = strtoupper(substr($className, 0, 1));
  $className = $first . substr($className, 1, strlen($className));
  $plr = plural($entity);
  $initial = substr($entity, 0, 1);
?>
	class <?php echo $className; ?>Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('<?php echo $initial; ?>.*');
			$this->db->from('<?php echo $plr . ' ' . $initial; ?>');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			if($i->post())
			{
				$this->db->insert
				(
					'<?php echo $plr; ?>', 
					getPostValuePair()
				);
				return $this->read($this->db->insert_id());
			}
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        '<?php echo $initial; ?>', 
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
        '<?php echo $plr; ?>', 
        getPostValuePair()
      );
			return $this->db->affected_rows() > 0;
		}
		public final function delete($id)
    {
      $this->db->where('<?php echo $initial; ?>.id', $id);
			return $this->db->delete();
    }
	}