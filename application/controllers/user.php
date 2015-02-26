<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller 
{
  private $aTitles;
	public function __construct()
	{
		parent::__construct();
    validateLoginSession(array('create'), 'exclude');
    $this->aTitles = array
    (
      'Mr.' => 'Mr.', 
      'Ms.' => 'Ms.', 
      'Mrs.' => 'Mrs.'
    );
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
    $a = array('titles' => $this->aTitles);
    if($this->input->post())
    {
      if($this->form_validation->run('user'))
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
        showView('users/create', $a);
      }
    }
    else
    {
      showView('users/create', $a);
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
      'roles' => $this->rolemodel->index()->result_array(),
      'titles' => $this->aTitles
    );
    if($this->input->post())
    {
      if($this->form_validation->run('user'))
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