<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Page extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('pagemodel');
  	}
    public final function index()
    {
      $o = $this->pagemodel->index()->result();
      showView('pages/index', array('pages' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('page/create'))
        {
          $o = $this->pagemodel->create()->row();
          if($o->id)
          {
            redirect(site_url('page/update/' . $o->id));
          }
          else
          {
            show_error('Error creating page.');
          }
        }
        else
        {
          showView('pages/create');
        }
      }
      else
      {
        showView('pages/create');
      }
    }
  	public final function read($id)
  	{
  		showView('pages/read', array('page' => $this->pagemodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->pagemodel->read($id)->row();
      $a = array('page' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run('page/update'))
        {
          $this->pagemodel->update();
          redirect(site_url('page/update/' . $this->input->post('id')));
        }
        else
        {
          showView('pages/update', $a);
        }
      }
      else
      {
        showView('pages/update', $a);
      }
    }
  	public final function delete($id, $format = 'html')
    {
      switch($format)
      {
        case 'html':
          $this->page_model->delete($id);
          redirect(site_url('page'));
        break;
        case 'json':
          showJsonView(array('page' => $this->pagemodel->delete($id)->row()));
        break;
      }
    }
  }