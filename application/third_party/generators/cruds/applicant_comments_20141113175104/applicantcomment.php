<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class ApplicantComment extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('applicantcommentmodel');
	}
  public final function index()
  {
    $o = $this->applicantcommentmodel->index()->result();
    showView('applicant_comments/index', array('applicantComments' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->applicantcommentmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('applicant_comment/read/' . $o->id));
        }
        else
        {
          show_error('Error creating applicant_comment.');
        }
      }
      else
      {
        showView('applicant_comments/create');
      }
    }
    else
    {
      showView('applicant_comments/create');
    }
  }
	public final function read($id)
	{
		showView('applicant_comments/read', array('applicantComment' => $this->applicantcommentmodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->applicantcommentmodel->read($id)->row();
    $a = array('applicantComment' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->applicantcommentmodel->update()->row();
        if($b)
        {
          redirect(site_url('applicant_comment/read/' . $o->id));
        }
        else
        {
          show_error('Error updating applicant_comment.');
        }
      }
      else
      {
        showView('applicant_comments/update', $a);
      }
    }
    else
    {
      showView('applicant_comments/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('applicantComment' => $this->applicantComment_model->delete($id)->row()));
  }
}