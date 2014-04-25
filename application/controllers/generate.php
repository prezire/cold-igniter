<?php
  class Generate extends CI_Controller
  {
    /*
      @param  $entity   String.
      @param  $fields   String. Dash-delimited.
      
      Usage: 
		- php index.php generate crud sub_page id:int title:varchar description:text enabled:boolean
      Creates the following folders, files and methods:
      Model:
        - SubPageModel (camelize() with appended Model)
          - index, create, read, update, delete
      Ctrl:
        - SubPage (camelize())
          - index, create, read, update, delete
      View:
        - sub_pages (plural())
          - index, create, read, update, delete
      Validation:
        - subpage/create
        - subpage/read
        - subpage/update
    */
    private $GENERATE_PATH = './application/views/generators/cruds';
	private $sViewFldr;
	//
    public final function crud()
    {
      if($this->input->is_cli_request())
      {
        $this->load->helper('inflector');
        $this->load->library('parser');
		$this->load->helper('file');
		//
		$params = $_SERVER['argv'];
		$fields = array();
		$len = $_SERVER['argc'];
		for($a = 4; $a < $len; $a++){array_push($fields, $params[$a]);}
		$entity = $params[3];
		echo "Generating...\n";
		//
		$this->sViewFldr = $this->GENERATE_PATH . '/' . plural($entity);
		if(!file_exists($this->sViewFldr))
		{
			mkdir($this->sViewFldr);
			echo "New directory $this->sViewFldr created.\n";
		}
		//
        $this->createCtrl($entity);
        $this->createMdl($entity);
        $this->createViews($entity, $fields);
		$this->createValidation($entity);
		$this->createTable($entity, $fields);
		echo "Done.\n";
      }
      exit(0);
    }
	private final function createTable($entity, $fields)
	{
		$aDefVals = array
		(
			'int' => 'INT',
			'varchar' => 'VARCHAR(255)',
			'text' => 'TEXT',
			'boolean' => 'TINYINT(1)'
		);
		$contents = "CREATE TABLE $entity(";
		foreach($fields as $f)
		{
			$l = explode(':', $f);
			$key = $l[0];
			$val = $l[1];
			//
			$contents .= $key . ' ' . $aDefVals[$val] . ' NOT NULL';
			if($key == 'id')
			{
				$contents .= ' AUTO_INCREMENT';
			}
			$contents .= ",\n";
		 }
		 $contents .=  'PRIMARY KEY (id))';
		 $filename = $this->sViewFldr . '/' . $entity . '_table.php';
		 $f = write_file($filename . '.php', $contents);
		echo "Database table file $filename created.\n";
	}
    private final function createCtrl($entity)
    {
      $filename = $this->sViewFldr . '/' . str_replace('_', '', $entity) . '.php';
      $contents = $this->parser->parse('generators/controller', array('entity' => $entity), true);
	  $f = write_file($filename . '.php', $contents);
	  echo "Controller file $filename created.\n";
    }
    private final function createMdl($entity)
    {
      $filename = $this->sViewFldr . '/' . str_replace('_', '', $entity) . 'model.php';
      $contents = $this->parser->parse('generators/model', array('entity' => $entity), true);
	  write_file($filename . '.php', $contents);
	  echo "Model file $filename created.\n";
    }
    private final function createViews($entity, $fields = array())
    {
      $fldr = plural($entity);
      $a = array();
      foreach($fields as $f)
      {
        $keyVal = explode(':', $f);
        $key = $keyVal[0];
        $tmp = null;
        switch($keyVal[1])
        {
          case 'int':
          case 'varchar':
            $tmp = array('name' => $key, 'field' => $this->toFormField('text', $entity, $key));
          break;
          case 'text':
            $tmp = array('name' => $key, 'field' => $this->toFormField('textarea', $entity, $key));
          break;
          case 'boolean':
            $tmp = array('name' => $key, 'field' => $this->toFormField('checkbox', $entity, $key));
          break;
        }
        array_push($a, $tmp);
      }
      $this->createView($entity, $a, 'index');
      $this->createView($entity, $a, 'create');
      $this->createView($entity, $a, 'read');
      //Re-create the fields again this time with set_values().
      $a = array();
      foreach($fields as $f)
      {
        $keyVal = explode(':', $f);
        $key = $keyVal[0];
        $tmp = null;
        switch($keyVal[1])
        {
          case 'int':
          case 'varchar':
		  case 'datetime':
            $tmp = array('name' => $key, 'field' => $this->toFormField('text', $entity, $key, true));
          break;
          case 'text':
            $tmp = array('name' => $key, 'field' => $this->toFormField('textarea', $entity, $key, true));
          break;
          case 'boolean':
            $tmp = array('name' => $key, 'field' => $this->toFormField('checkbox', $entity, $key, true));
          break;
        }
        array_push($a, $tmp);
      }
      $this->createView($entity, $a, 'update');
      //Delete will be using JS in the index view.
    }
    private final function toFormField($type, $entity, $key, $isUpdate = false)
    {
      $cml = camelize($entity);
      $value = $isUpdate ? '<?php echo set_value(\'' . $key . '\', $' . $cml . '->' . $key . '); ?>' : '';
      $s = null;
      switch($type)
      {
        case 'text': 
          $s = $isUpdate ?
          '<input type="text" name="' . $key . '" value="' . $value . '" />' :
          '<input type="text" name="' . $key . '" />';
        break;
        case 'textarea': 
          $s = $isUpdate ?
            '<textarea name="' . $key . '">' . $value . '</textarea>' :
            '<textarea name="' . $key . '"></textarea>';
        break;
        case 'checkbox': 
          $sChecked = '<?php echo set_value(\'' . $key . '\',  $' . $cml . '->' . $key . '); ?>';
          $s = $isUpdate ?
          '<input type="checkbox" name="' . $key . '" checked="' . $sChecked . '" />' :
          '<input type="checkbox" name="' . $key . '" />';
        break;
      }
      return $s;
    }
    private final function createView($entity, $fields, $type)
    {
		$filename = $this->sViewFldr . '/' . $type . '.php';
      $contents = $this->parser->parse
      (
        'generators/' . $type, 
        array('entity' => $entity, 'fields' => $fields),
        true
      );
      echo "View file $filename created.\n";
	  write_file($filename, $contents);
    }
    private final function createValidation($entity)
    {
	   $contents = $this->parser->parse
      (
        'generators/form_validation', 
        array('entity' => str_replace('_', '', $entity)),
        true
      );
      $filename = $this->sViewFldr . '/form_validation.php';
	  write_file($filename, $contents);
	  echo "Validation file $filename created.\n";
    }
  }