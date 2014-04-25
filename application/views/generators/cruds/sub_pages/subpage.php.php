<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class SubPage extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('subpagemodel');
	}
  public final function index()
  {
    $o = $this->subpagemodel->index()->result();
    showView('sub_pages/index', array('subPages' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->subpagemodel->create()->row();
        if($o->id)
        {
          redirect(site_url('sub_page/read/' . $o->id));
        }
        else
        {
          show_error('Error creating sub_page.');
        }
      }
      else
      {
        showView('sub_pages/create');
      }
    }
    else
    {
      showView('sub_pages/create');
    }
  }
	public final function read($id)
	{
		showView('sub_pages/read', array('subPage' => $this->subpagemodel->read($id)->row())));
	}
	public final function update($id = null)
  {
    $o = $this->subpagemodel->read($id)->row();
    $a = array('subPage' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->subpagemodel->update()->row();
        if($b)
        {
          redirect(site_url('sub_page/read/' . $o->id));
        }
        else
        {
          show_error('Error updating sub_page.');
        }
      }
      else
      {
        showView('sub_pages/update', $a);
      }
    }
    else
    {
      showView('sub_pages/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('subPage' => $this->subPage_model->delete($id)->row())));
  }
}