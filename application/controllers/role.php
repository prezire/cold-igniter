<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Role extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('rolemodel');
	}
  public final function index()
  {
    $o = $this->rolemodel->index()->result();
    showView('auth/roles/index', array('roles' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run('role'))
      {
        $o = $this->rolemodel->create()->row();
        if($o->id)
        {
          redirect(site_url('role/read/' . $o->id));
        }
        else
        {
          show_error('Error creating role.');
        }
      }
      else
      {
        showView('auth/roles/create');
      }
    }
    else
    {
      showView('auth/roles/create');
    }
  }
	public final function read($id)
	{
		showView('roles/read', array('role' => $this->rolemodel->read($id)->row()));
	}
  //
	public final function update($id = null)
  {
    $o = $this->rolemodel->read($id)->row();
    $a = array('role' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run('role'))
      {
        $this->rolemodel->update();
        redirect(site_url('role/update/' . $this->input->post('id')));
      }
      else
      {
        showView('auth/roles/update', $a);
      }
    }
    else
    {
      showView('auth/roles/update', $a);
    }
  }
	public final function delete($id)
  {
    $this->rolemodel->delete($id);
    redirect(site_url('role'));
  }
}