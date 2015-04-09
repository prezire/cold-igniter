<?php 
  echo '<?php';
  //
  $cml = camelize($entity);
  $className = $cml;
  $first = strtoupper(substr($className, 0, 1));
  $className = $first . substr($className, 1, strlen($className));
  $mdl = strtolower($cml) . 'model';
  $plr = plural($entity);
?> 
  //<?php echo $command; ?>

  
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class <?php echo $className; ?> extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('<?php echo $mdl; ?>');
  	}
    public final function index()
    {
      $o = $this-><?php echo $mdl; ?>->index()->result();
      showView('<?php echo $plr; ?>/index', array('<?php echo plural($cml); ?>' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('<?php echo $entity; ?>/create'))
        {
          $o = $this-><?php echo $mdl; ?>->create()->row();
          if($o->id)
          {
            redirect(site_url('<?php echo $entity; ?>/update/' . $o->id));
          }
          else
          {
            show_error('Error creating <?php echo $entity; ?>.');
          }
        }
        else
        {
          showView('<?php echo $plr; ?>/create');
        }
      }
      else
      {
        showView('<?php echo $plr; ?>/create');
      }
    }
  	public final function read($id)
  	{
  		showView('<?php echo $plr; ?>/read', array('<?php echo $cml; ?>' => $this-><?php echo $mdl; ?>->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this-><?php echo $mdl; ?>->read($id)->row();
      $a = array('<?php echo $cml;?>' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run('<?php echo $entity; ?>/update'))
        {
          $this-><?php echo $mdl; ?>->update();
          redirect(site_url('<?php echo $entity; ?>/update/' . $this->input->post('id')));
        }
        else
        {
          showView('<?php echo $plr; ?>/update', $a);
        }
      }
      else
      {
        showView('<?php echo $plr; ?>/update', $a);
      }
    }
  	public final function delete($id, $format = 'html')
    {
      switch($format)
      {
        case 'html':
          $this-><?php echo $mdl; ?>->delete($id);
          redirect(site_url('<?php echo $entity; ?>'));
        break;
        case 'json':
          showJsonView(array('<?php echo $cml; ?>' => $this-><?php echo $mdl; ?>->delete($id)->row()));
        break;
      }
    }
  }