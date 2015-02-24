<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('usermodel');
    $this->load->helper('country_helper');
	}
  public final function index()
  {
    $o = $this->usermodel->index()->result();
    showView('users/index', array('users' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->usermodel->create()->row();
        if($o->id)
        {
          redirect(site_url('user/read/' . $o->id));
        }
        else
        {
          show_error('Error creating user.');
        }
      }
      else
      {
        showView('users/create');
      }
    }
    else
    {
      showView('users/create');
    }
  }
	public final function read($id)
	{
		showView('users/read', array('user' => $this->usermodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $this->load->model('rolemodel');
    $o = $this->usermodel->read($id)->row();
    $a = array
    (
      'user' => $o,
      'roles' => $this->rolemodel->index()->result_array()
    );
    if($this->input->post())
    {
      if($this->form_validation->run('user/update'))
      {
        $this->usermodel->update();
        redirect(site_url('user/update/' . $this->input->post('id')));
      }
      else
      {
        showView('users/update', $a);
      }
    }
    else
    {
      showView('users/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('user' => $this->user_model->delete($id)->row()));
  }
}