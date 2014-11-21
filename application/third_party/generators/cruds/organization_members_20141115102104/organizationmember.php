<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class OrganizationMember extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('organizationmembermodel');
	}
  public final function index()
  {
    $o = $this->organizationmembermodel->index()->result();
    showView('organization_members/index', array('organizationMembers' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->organizationmembermodel->create()->row();
        if($o->id)
        {
          redirect(site_url('organization_member/read/' . $o->id));
        }
        else
        {
          show_error('Error creating organization_member.');
        }
      }
      else
      {
        showView('organization_members/create');
      }
    }
    else
    {
      showView('organization_members/create');
    }
  }
	public final function read($id)
	{
		showView('organization_members/read', array('organizationMember' => $this->organizationmembermodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->organizationmembermodel->read($id)->row();
    $a = array('organizationMember' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->organizationmembermodel->update()->row();
        if($b)
        {
          redirect(site_url('organization_member/read/' . $o->id));
        }
        else
        {
          show_error('Error updating organization_member.');
        }
      }
      else
      {
        showView('organization_members/update', $a);
      }
    }
    else
    {
      showView('organization_members/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('organizationMember' => $this->organizationMember_model->delete($id)->row()));
  }
}