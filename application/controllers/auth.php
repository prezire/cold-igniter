<?php
  if(!defined('BASEPATH')) exit('No direct script access allowed');
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
            redirect(site_url('/'));
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
      redirect(site_url('/'));
    }
    //
    /*
    * Returns privileges by comparing them to $privilegeNames.
    * @param    $privilegeNames    array.
    * @return   array.
    */
    public final function readIsPrivileged($userId, $privilegeNames)
    {
      $this->load->model('privilegemodel');
      $a = $this->privilegemodel->readIsPrivileged
      (
        $userId, 
        getArrayParams(1, $privilageNames)
      )->result_array();
      return array_intersect($privilegeNames, $a);
    }
    //curl http://localhost/cold-igniter/index.php/auth
    public final function index() {
      //$u = getLoggedUser();
      //
      $this->load->model('usermodel');
      $u = $this->usermodel->read(7)->row();
      $uId = $u->id;
      $roleId = $u->role_id;
      $perms = $this->readPermissions( $uId, 'User' );
      $bAllPerms = count($perms) > 3;
      if ( $bAllPerms ) {
        $this->load->model( 'usermodel' );
        $tmp = $this->usermodel->index()->result();
        $users = array();
        foreach($tmp as $u)
        {
          $users[$u->id] = $u->complete_name;
        }
        $a = array('users' => $users);
        showView( 'auth/index', $a );
      }
      else {
        redirect( site_url() );
      }
    }
    /*
  * Returns the permissions of such privilege.
  *
  * @meth    readPermissions    Returns a list of allowed 
  * permissions based on the requested permissions.
  * 
  * @param  $requestedPermissions    array.  Determines
  * if the requested permissions are included in the allowed
  * permissions. No parameters mean request for all permissions.
  *
  * @return array
  * 
  * Examples:
  * //Super Admin. Returns all permissions.
  * readPermissions(1, 'User');
  * //Returns 2 permissions. 'Something' is not a permission.
  * readPermissions(2, 'User', array('Create', 'Read', 'Something'));
  * //Admin. Returns 1 permission because he's not allowed to delete.
  * readPermissions(3, 'User', array('Create', 'Delete'));
  */
  //curl http://localhost/cold-igniter/index.php/permission/readPermissions/7/User/Create/Read
  private final function readPermissions
  (
    $userId,
    $privilegeName,
    $requestedPermissions = null
  ) {
    if(empty($requestedPermissions))
    {
      $requestedPermissions = array
      (
        permissionmodel::CREATE,
        permissionmodel::READ,
        permissionmodel::UPDATE,
        permissionmodel::DELETE,
      );

    }
    else
    {
      //Used only for cURL GET method.
      //$requestedPermissions = getArrayParams(3, $requestedPermissions);
    }
    $perms = $this->permissionmodel->readPermissions
    (
      $userId,
      $privilegeName,
      $requestedPermissions
    )->result_array();
    $a = array();
    foreach($perms as $p)
    {
      array_push($a, $p['name']);
    }
    $i = array_intersect( $requestedPermissions, $a );
    return $i;
  }
  }