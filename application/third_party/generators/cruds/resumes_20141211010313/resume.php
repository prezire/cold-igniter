<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Resume extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('resumemodel');
	}
  public final function index()
  {
    $o = $this->resumemodel->index()->result();
    showView('resumes/index', array('resumes' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->resumemodel->create()->row();
        if($o->id)
        {
          redirect(site_url('resume/read/' . $o->id));
        }
        else
        {
          show_error('Error creating resume.');
        }
      }
      else
      {
        showView('resumes/create');
      }
    }
    else
    {
      showView('resumes/create');
    }
  }
	public final function read($id)
	{
		showView('resumes/read', array('resume' => $this->resumemodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->resumemodel->read($id)->row();
    $a = array('resume' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->resumemodel->update()->row();
        if($b)
        {
          redirect(site_url('resume/read/' . $o->id));
        }
        else
        {
          show_error('Error updating resume.');
        }
      }
      else
      {
        showView('resumes/update', $a);
      }
    }
    else
    {
      showView('resumes/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('resume' => $this->resume_model->delete($id)->row()));
  }
}