<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class CompanyMember extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('companymembermodel');
	}
  public final function index()
  {
    $o = $this->companymembermodel->index()->result();
    showView('company_members/index', array('companyMembers' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->companymembermodel->create()->row();
        if($o->id)
        {
          redirect(site_url('company_member/read/' . $o->id));
        }
        else
        {
          show_error('Error creating company_member.');
        }
      }
      else
      {
        showView('company_members/create');
      }
    }
    else
    {
      showView('company_members/create');
    }
  }
	public final function read($id)
	{
		showView('company_members/read', array('companyMember' => $this->companymembermodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->companymembermodel->read($id)->row();
    $a = array('companyMember' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->companymembermodel->update()->row();
        if($b)
        {
          redirect(site_url('company_member/read/' . $o->id));
        }
        else
        {
          show_error('Error updating company_member.');
        }
      }
      else
      {
        showView('company_members/update', $a);
      }
    }
    else
    {
      showView('company_members/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('companyMember' => $this->companyMember_model->delete($id)->row()));
  }
}