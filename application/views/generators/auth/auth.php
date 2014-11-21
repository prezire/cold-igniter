<?php
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Auth extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
    }
    public final function login()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('auth'))
        {
          $this->load->model('authmodel');
          $u = $this->authmodel->login()->row();
          if($u->id > 0)
          {
            $this->session->set_userdata('user', $u);
            redirect(site_url('/'));
          }
          else
          {
            showView
            (
              'users/login', 
              array('error' => 'User not found.')
            );
          }
        }
        else
        {
          showView('users/login');
        }
      }
      else
      {
        showView('users/login');
      }
    }
    public final function logout()
    {
      $this->session->sess_destroy();
      redirect(site_url('/'));
    }
  }