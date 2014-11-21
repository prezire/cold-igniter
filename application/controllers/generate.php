<?php
  class Generate extends CI_Controller
  {
    private $GENERATE_PATH = './application/third_party/generators';
    private $sCrudViewFldr;
    private $sAuthFldr;
    public function __construct()
    {
      parent::__construct();
      $this->load->helper('inflector');
      $this->load->library('parser');
      $this->load->helper('file');
      $s = $this->GENERATE_PATH;
      if(!file_exists($s))
      {
        mkdir($s);
      }
    }
    /*
      @param  $entity   String.
      @param  $fields   String. Colon-delimited. field_name:data_type
      
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
    public final function crud()
    {
      if($this->input->is_cli_request())
      {
		$params = $_SERVER['argv'];
		$fields = array();
		$len = $_SERVER['argc'];
		for($a = 4; $a < $len; $a++){array_push($fields, $params[$a]);}
		$entity = $params[3];
		echo "Generating...\n";
		//Create initial CRUD dir.
		//Use date for versioning.
		$d = date('YmdHis');
		$this->sCrudViewFldr = $this->GENERATE_PATH . '/cruds/' . plural($entity) . '_' . $d;
		//
		if(!file_exists($this->sCrudViewFldr))
		{
			mkdir($this->sCrudViewFldr);
		}
		if(!file_exists($this->sCrudViewFldr))
		{
			mkdir($this->sCrudViewFldr);
			$this->echoFileCreated('New directory', $this->sCrudViewFldr);
		}
		//
        $this->createCrudCtrl($entity);
        $this->createCrudMdl($entity);
        $this->createCrudViews($entity, $fields);
      $this->createCrudValidation($entity);
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
			'datetime' => 'DATETIME',
			'text' => 'TEXT',
			'boolean' => 'TINYINT(1)'
		);
		$entity = plural($entity);
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
		 $filename = $this->sCrudViewFldr . '/' . $entity . '_table';
		 write_file($filename . '.sql', $contents);
    $this->echoFileCreated('Database table', $filename);
	}
    private final function createCrudCtrl($entity)
    {
      $filename = $this->sCrudViewFldr . '/' . str_replace('_', '', $entity);
      $contents = $this->parser->parse('generators/cruds/controller', array('entity' => $entity), true);
      write_file($filename . '.php', $contents);
      $this->echoFileCreated('Controller', $filename);
    }
    private final function createCrudMdl($entity)
    {
      $filename = $this->sCrudViewFldr . '/' . str_replace('_', '', $entity) . 'model';
      $contents = $this->parser->parse('generators/cruds/model', array('entity' => $entity), true);
	  write_file($filename . '.php', $contents);
      $this->echoFileCreated('Model', $filename);
    }
    private final function createCrudViews($entity, $fields = array())
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
		$filename = $this->sCrudViewFldr . '/' . $type . '.php';
      $contents = $this->parser->parse
      (
        'generators/cruds/' . $type, 
        array('entity' => $entity, 'fields' => $fields),
        true
      );
      write_file($filename, $contents);
      $this->echoFileCreated('View', $filename);
    }
    private final function createCrudValidation($entity)
    {
	   $contents = $this->parser->parse
      (
        'generators/cruds/form_validation', 
        array('entity' => str_replace('_', '', $entity)),
        true
      );
      $filename = $this->sCrudViewFldr . '/form_validation.php';
      write_file($filename, $contents);
      $this->echoFileCreated('Validation', $filename);
    }
    private final function echoFileCreated
    (
      $type, 
      $filename
    )
    {
      echo "$type $filename created.\n";
    }
    //
    public final function privilages(){}
  }