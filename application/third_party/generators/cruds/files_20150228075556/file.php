<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class File extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('filemodel');
  	}
    public final function index()
    {
      $o = $this->filemodel->index()->result();
      showView('files/index', array('files' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('file/create'))
        {
          $o = $this->filemodel->create()->row();
          if($o->id)
          {
            redirect(site_url('file/update/' . $o->id));
          }
          else
          {
            show_error('Error creating file.');
          }
        }
        else
        {
          showView('files/create');
        }
      }
      else
      {
        showView('files/create');
      }
    }
  	public final function read($id)
  	{
  		showView('files/read', array('file' => $this->filemodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->filemodel->read($id)->row();
      $a = array('file' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run('file/update'))
        {
          $this->filemodel->update();
          redirect(site_url('file/update/' . $this->input->post('id')));
        }
        else
        {
          showView('files/update', $a);
        }
      }
      else
      {
        showView('files/update', $a);
      }
    }
  	public final function delete($id, $format = 'html')
    {
      switch($format)
      {
        case 'html':
          $this->file_model->delete($id);
          redirect(site_url('file'));
        break;
        case 'json':
          showJsonView(array('file' => $this->filemodel->delete($id)->row()));
        break;
      }
    }
  }