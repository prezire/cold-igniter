<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Student extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('studentmodel');
	}
  public final function index()
  {
    $o = $this->studentmodel->index()->result();
    showView('students/index', array('students' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->studentmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('student/read/' . $o->id));
        }
        else
        {
          show_error('Error creating student.');
        }
      }
      else
      {
        showView('students/create');
      }
    }
    else
    {
      showView('students/create');
    }
  }
	public final function read($id)
	{
		showView('students/read', array('student' => $this->studentmodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->studentmodel->read($id)->row();
    $a = array('student' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->studentmodel->update()->row();
        if($b)
        {
          redirect(site_url('student/read/' . $o->id));
        }
        else
        {
          show_error('Error updating student.');
        }
      }
      else
      {
        showView('students/update', $a);
      }
    }
    else
    {
      showView('students/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('student' => $this->student_model->delete($id)->row()));
  }
}