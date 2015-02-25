<?php
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Auth extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('permissionmodel');
    }
    public final function login()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('auth/login'))
        {
          $this->load->model('authmodel');
          $u = $this->authmodel->login()->row();
          if($u->id > 0)
          {
            $this->session->set_userdata('user', $u);
            redirect(site_url('home'));
          }
          else
          {
            showView
            (
              'auth/login', 
              array('error' => 'User not found.')
            );
          }
        }
        else
        {
          showView('auth/login', array('error' => true));
        }
      }
      else
      {
        showView('auth/login');
      }
    }
    public final function logout()
    {
      $this->session->set_userdata('user', null);
      $this->session->sess_destroy();
      redirect(site_url('auth/login'));
    }
  }