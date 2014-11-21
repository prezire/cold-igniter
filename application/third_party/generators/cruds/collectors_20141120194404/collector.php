<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Collector extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('collectormodel');
	}
  public final function index()
  {
    $o = $this->collectormodel->index()->result();
    showView('collectors/index', array('collectors' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->collectormodel->create()->row();
        if($o->id)
        {
          redirect(site_url('collector/read/' . $o->id));
        }
        else
        {
          show_error('Error creating collector.');
        }
      }
      else
      {
        showView('collectors/create');
      }
    }
    else
    {
      showView('collectors/create');
    }
  }
	public final function read($id)
	{
		showView('collectors/read', array('collector' => $this->collectormodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->collectormodel->read($id)->row();
    $a = array('collector' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->collectormodel->update()->row();
        if($b)
        {
          redirect(site_url('collector/read/' . $o->id));
        }
        else
        {
          show_error('Error updating collector.');
        }
      }
      else
      {
        showView('collectors/update', $a);
      }
    }
    else
    {
      showView('collectors/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('collector' => $this->collector_model->delete($id)->row()));
  }
}