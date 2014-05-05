<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class PageSection extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('pagesectionmodel');
	}
  public final function index()
  {
    $o = $this->pagesectionmodel->index()->result();
    showView('page_sections/index', array('pageSections' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->pagesectionmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('page_section/read/' . $o->id));
        }
        else
        {
          show_error('Error creating page_section.');
        }
      }
      else
      {
        showView('page_sections/create');
      }
    }
    else
    {
      showView('page_sections/create');
    }
  }
	public final function read($id)
	{
		showView('page_sections/read', array('pageSection' => $this->pagesectionmodel->read($id)->row())));
	}
	public final function update($id = null)
  {
    $o = $this->pagesectionmodel->read($id)->row();
    $a = array('pageSection' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->pagesectionmodel->update()->row();
        if($b)
        {
          redirect(site_url('page_section/read/' . $o->id));
        }
        else
        {
          show_error('Error updating page_section.');
        }
      }
      else
      {
        showView('page_sections/update', $a);
      }
    }
    else
    {
      showView('page_sections/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('pageSection' => $this->pageSection_model->delete($id)->row())));
  }
}