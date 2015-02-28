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
    public final function loginAs()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('auth/login'))
        {
          $this->load->model('authmodel');
          $u = $this->authmodel->login()->row();
          if($u->id > 0)
          {
            //Store the original user who first logged-in.
            $this->session->set_userdata('originalUser', getLoggedUser());
            $this->session->unset_userdata('user');
            $this->session->set_userdata('user', $u);
            showJsonView(array('status' => 'success', 'user_id' => $u->id));
          }
          else
          {
            showJsonView(array('status' => 'failed'));
          }
        }
      }
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
      $this->session->unset_userdata('user');
      $this->session->unset_userdata('originalUser');
      $this->session->set_userdata('user', null);
      $this->session->set_userdata('originalUser', null);
      $this->session->sess_destroy();
      redirect(site_url('auth/login'));
    }
    public final function logoutAs()
    {
      //Switch back to the original user.
      $this->session->set_userdata
      (
        'user', 
        $this->session->userdata('originalUser')
      );
      //Remove stored original user.
      $this->session->unset_userdata('originalUser');
      $this->session->set_userdata('originalUser', null);
      redirect(site_url('user/update/' . getLoggedUser()->id));
    }
  }