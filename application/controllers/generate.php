<?php
  class Generate extends CI_Controller
  {
    private $GENERATE_PATH = './application/third_party/generators';
    private $sCrudViewFldr;
    private $sAuthFldr;
    public function __construct() {
      parent::__construct();
      $this->load->helper( 'inflector' );
      $this->load->library( 'parser' );
      $this->load->helper( 'file' );
      $s = $this->GENERATE_PATH;
      if ( !file_exists( $s ) ) {
        mkdir( $s );
      }
    }
    /*
        @param  $entity   String.
        @param  $fields   String. Colon-delimited. field_name:data_type

        CLI usage:
        php index.php generate crud student id:int full_name:varchar description:text enabled:boolean birth_date:datetime avatar:file gender:enum:Male-Female
    */
    public final function crud() {
      if ( $this->input->is_cli_request() ) {
        $params = $_SERVER['argv'];
        //
        $fields = array();
        $len = $_SERVER['argc'];
        for ( $a = 4; $a < $len; $a++ ) {array_push( $fields, $params[$a] );}
        $entity = $params[3];
        echo "Generating...\n";
        //Create initial CRUD dir.
        //Use date for versioning.
        $d = date( 'YmdHis' );
        $this->sCrudViewFldr = $this->GENERATE_PATH . '/cruds/' . plural( $entity ) . '_' . $d;
        //
        if ( !file_exists( $this->sCrudViewFldr ) ) {
          mkdir( $this->sCrudViewFldr );
          $this->echoFileCreated( 'New directory', $this->sCrudViewFldr );
        }
        //Record last executed CLI command in the controller.
        $sCmd = 'php';
        foreach ($params as $p) {
          $sCmd .= ' ' . $p;
        }
        //
        $this->createCrudCtrl( $sCmd, $entity );
        $this->createCrudMdl( $entity, $fields );
        $this->createCrudViews( $entity, $fields );
        $this->createCrudValidation( $entity );
        $this->createTable( $entity, $fields );
        echo "Done.\n";
      }
      PHP_EOL;
      exit( 0 );
    }
    private final function createTable( $entity, $fields ) {
      $aDefVals = array
      (
        'int' => 'INT',
        'varchar' => 'VARCHAR(255)',
        'file' => 'VARCHAR(255)',
        'float' => 'FLOAT(11)', 
        'datetime' => 'DATETIME',
        'text' => 'TEXT',
        'boolean' => 'TINYINT(1)',
        'enum' => 'ENUM'
      );
      $entity = plural( $entity );
      $contents = "CREATE TABLE $entity(";
      foreach ( $fields as $f ) {
        $l = explode( ':', $f );
        $key = $l[0];
        $val = $l[1];
        if($val == 'enum')
        {
          $enumParams = str_replace('-', "','", $l[2]);
          $contents .= $key . ' ' . $aDefVals[$val] . '(\'' . $enumParams . '\')';
        }
        else
        {
          $contents .= $key . ' ' . $aDefVals[$val];
        }
        $contents .= ' NOT NULL';
        if ( $key == 'id' ) {
          $contents .= ' AUTO_INCREMENT';
        }

        $contents .= ",\n";
      }
      $contents .=  'PRIMARY KEY (id))';
      $filename = $this->sCrudViewFldr . '/' . $entity . '_table';
      write_file( $filename . '.sql', $contents );
      $this->echoFileCreated( 'Database table', $filename );
    }
    private final function createCrudCtrl( $command, $entity ) {
      $filename = $this->sCrudViewFldr . '/' . str_replace( '_', '', $entity );
      $contents = $this->parser->parse
      ( 
        'generators/cruds/controller', 
        array( 'entity' => $entity, 'command' => $command ), 
        true 
      );
      write_file( $filename . '.php', $contents );
      $this->echoFileCreated( 'Controller', $filename );
    }
    private final function createCrudMdl( $entity, $fields = array() ) {
      $filename = $this->sCrudViewFldr . '/' . str_replace( '_', '', $entity ) . 'model';
      //
      $aFiles = array();
      foreach ( $fields as $f ) {
        $l = explode( ':', $f );
        $key = $l[0];
        $val = $l[1];
        if($val == 'file')
        {
          array_push($aFiles, array($key, $val));
        }
      }
      //
      $contents = $this->parser->parse
      ( 
        'generators/cruds/model', 
        array( 'entity' => $entity, 'files' => $aFiles ), 
        true 
      );
      write_file( $filename . '.php', $contents );
      $this->echoFileCreated( 'Model', $filename );
    }
    private final function createCrudViews( $entity, $fields = array() ) {
      $fldr = plural( $entity );
      $a = array();
      foreach ( $fields as $f ) {
        $keyVal = explode( ':', $f );
        $key = $keyVal[0];
        $tmp = null;
        switch ( $keyVal[1] ) {
          case 'int':
          case 'varchar':
          case 'datetime':
          case 'float':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'text', $entity, $key ) );
            break;
          case 'text':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'textarea', $entity, $key ) );
            break;
          case 'boolean':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'checkbox', $entity, $key ) );
            break;
          case 'file':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'file', $entity, $key ) );
            break;
          case 'enum':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'enum', $entity, $key ) );
            break;
        }
        array_push( $a, $tmp );
      }
      $this->createView( $entity, $a, 'index' );
      $this->createView( $entity, $a, 'create' );
      $this->createView( $entity, $a, 'read' );
      //
      //Re-create the fields again this time with set_values() during form validation.
      $a = array();
      foreach ( $fields as $f ) {
        $keyVal = explode( ':', $f );
        $key = $keyVal[0];
        $tmp = null;
        switch ( $keyVal[1] ) {
          case 'int':
          case 'varchar':
          case 'datetime':
          case 'float':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'text', $entity, $key, true ) );
            break;
          case 'text':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'textarea', $entity, $key, true ) );
            break;
          case 'boolean':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'checkbox', $entity, $key, true ) );
            break;
          case 'file':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'file', $entity, $key, true ) );
            break;
          case 'enum':
            $tmp = array( 'name' => $key, 'field' => $this->toFormField( 'enum', $entity, $key, true ) );
            break;
        }
        array_push( $a, $tmp );
      }
      $this->createView( $entity, $a, 'update' );
      //Delete will be using JS in the index view.
    }
    private final function toFormField( $type, $entity, $key, $isUpdate = false ) {
      $cml = camelize( $entity );
      $value = $isUpdate ? '<?php echo set_value(\'' . $key . '\', $' . $cml . '->' . $key . '); ?>' : '';
      $s = null;
      switch ( $type ) {
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
        case 'file':
          $s = '<input type="file" name="' . $key . '" />';
        break;
        case 'enum':
          $sSelected = 'set_value(\'' . $key . '\',  $' . $cml . '->' . $key . ')';
          $s = $isUpdate ?
            '<?php echo form_dropdown(\'' . $key . '\', $' . plural($key) . ', ' . $sSelected . '); ?>' :
            '<?php echo form_dropdown(\'' . $key . '\', $' . plural($key) . '); ?>';
        break;
      }
      return $s;
    }
    private final function createView( $entity, $fields, $type ) {
      $filename = $this->sCrudViewFldr . '/' . $type . '.php';
      $contents = $this->parser->parse
      (
        'generators/cruds/' . $type,
        array( 'entity' => $entity, 'fields' => $fields ),
        true
      );
      write_file( $filename, $contents );
      $this->echoFileCreated( 'View', $filename );
    }
    private final function createCrudValidation( $entity ) {
      $contents = $this->parser->parse
      (
        'generators/cruds/form_validation',
        array( 'entity' => str_replace( '_', '', $entity ) ),
        true
      );
      $filename = $this->sCrudViewFldr . '/form_validation.php';
      write_file( $filename, $contents );
      $this->echoFileCreated( 'Validation', $filename );
    }
    private final function echoFileCreated(
      $type,
      $filename
    ) {
      echo "$type $filename created.\n";
    }
  }