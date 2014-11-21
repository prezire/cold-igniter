<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Visitor extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('visitormodel');
	}
  public final function index()
  {
    $o = $this->visitormodel->index()->result();
    showView('visitors/index', array('visitors' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->visitormodel->create()->row();
        if($o->id)
        {
          redirect(site_url('visitor/read/' . $o->id));
        }
        else
        {
          show_error('Error creating visitor.');
        }
      }
      else
      {
        showView('visitors/create');
      }
    }
    else
    {
      showView('visitors/create');
    }
  }
	public final function read($id)
	{
		showView('visitors/read', array('visitor' => $this->visitormodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->visitormodel->read($id)->row();
    $a = array('visitor' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->visitormodel->update()->row();
        if($b)
        {
          redirect(site_url('visitor/read/' . $o->id));
        }
        else
        {
          show_error('Error updating visitor.');
        }
      }
      else
      {
        showView('visitors/update', $a);
      }
    }
    else
    {
      showView('visitors/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('visitor' => $this->visitor_model->delete($id)->row()));
  }
}