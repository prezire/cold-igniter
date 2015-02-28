<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Comment extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('commentmodel');
  	}
    public final function index()
    {
      $o = $this->commentmodel->index()->result();
      showView('comments/index', array('comments' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('comment/create'))
        {
          $o = $this->commentmodel->create()->row();
          if($o->id)
          {
            redirect(site_url('comment/update/' . $o->id));
          }
          else
          {
            show_error('Error creating comment.');
          }
        }
        else
        {
          showView('comments/create');
        }
      }
      else
      {
        showView('comments/create');
      }
    }
  	public final function read($id)
  	{
  		showView('comments/read', array('comment' => $this->commentmodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->commentmodel->read($id)->row();
      $a = array('comment' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run('comment/update'))
        {
          $this->commentmodel->update();
          redirect(site_url('comment/update/' . $this->input->post('id')));
        }
        else
        {
          showView('comments/update', $a);
        }
      }
      else
      {
        showView('comments/update', $a);
      }
    }
  	public final function delete($id, $format = 'html')
    {
      switch($format)
      {
        case 'html':
          $this->comment_model->delete($id);
          redirect(site_url('comment'));
        break;
        case 'json':
          showJsonView(array('comment' => $this->commentmodel->delete($id)->row()));
        break;
      }
    }
  }