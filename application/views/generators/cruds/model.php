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
			$this->db->insert
			(
				'<?php echo $plr; ?>', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
	      return $this->db->get_where
	      (
	        '<?php echo $plr; ?>', 
	        array('id' => $id)
	      );
		}
		<?php 
			if(count($files) > 0){
				foreach($files as $f){
					$key = $f[0];
					$val = $f[1]; 
					$methName = str_replace(' ', '', humanize($key));
					$vars = camelize($key);
		?>public final function upload<?php echo $methName; ?>($<?php echo $entity; ?>Id)
	    {
	      //TODO: Query and remove prev image file.
	      $<?php echo $vars; ?> = upload('<?php echo $vars; ?>');
	      if(isset($<?php echo $vars; ?>))
	      {
	        $a = array('<?php echo $vars; ?>' => $<?php echo $vars; ?>['file_name']);
	        $this->db->where('id', $id);
	        $this->db->update('<?php echo $plr; ?>', $a);
	      }
	    }<?php }} ?>

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
		}
		public final function delete($id)
	    {
	    	$this->db->where('id', $id);
			return $this->db->delete('<?php echo $plr; ?>');
	    }
	}