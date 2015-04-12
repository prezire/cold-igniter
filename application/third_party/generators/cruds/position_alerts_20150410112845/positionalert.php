<?php 
  //php index.php generate crud position_alert id:int email:varchar frequency:enum:Weekly-Monthly keywords:varchar country:varchar date_time_created:datetime
  
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class PositionAlert extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('positionalertmodel');
  	}
    public final function index()
    {
      $o = $this->positionalertmodel->index()->result();
      showView('position_alerts/index', array('positionAlerts' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('position_alert/create'))
        {
          $o = $this->positionalertmodel->create()->row();
          if($o->id)
          {
            redirect(site_url('position_alert/update/' . $o->id));
          }
          else
          {
            show_error('Error creating position_alert.');
          }
        }
        else
        {
          showView('position_alerts/create');
        }
      }
      else
      {
        showView('position_alerts/create');
      }
    }
  	public final function read($id)
  	{
  		showView('position_alerts/read', array('positionAlert' => $this->positionalertmodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->positionalertmodel->read($id)->row();
      $a = array('positionAlert' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run('position_alert/update'))
        {
          $this->positionalertmodel->update();
          redirect(site_url('position_alert/update/' . $this->input->post('id')));
        }
        else
        {
          showView('position_alerts/update', $a);
        }
      }
      else
      {
        showView('position_alerts/update', $a);
      }
    }
  	public final function delete($id, $format = 'html')
    {
      switch($format)
      {
        case 'html':
          $this->positionalertmodel->delete($id);
          redirect(site_url('position_alert'));
        break;
        case 'json':
          showJsonView(array('positionAlert' => $this->positionalertmodel->delete($id)->row()));
        break;
      }
    }
  }