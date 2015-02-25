<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Permission extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model( 'permissionmodel' );
  }

  public final function index()
  {
    $p = $this->permissionmodel->index()->result();
    showView('auth/permissions/index', array('permissions' => $p));
  }
  public final function userPermissions() 
  {
    $this->load->model('usermodel');
    $a = $this->permissionmodel->readUserPermissions();
    $a['permissions'] = $this->permissionmodel->index()->result_array();
    showView( 'auth/permissions/user_permissions', $a );
  }
  public final function create() {
    if ( $this->input->post() ) {
      if ( $this->form_validation->run('permission') ) {
        $o = $this->permissionmodel->create()->row();
        if ( $o->id ) {
          redirect( site_url( 'permission/update/' . $o->id ) );
        }
        else {
          show_error( 'Error creating permission.' );
        }
      }
      else {
        showView( 'auth/permissions/create' );
      }
    }
    else {
      showView( 'auth/permissions/create' );
    }
  }
  public final function read( $id ) {
    showView( 'permissions/read', array
    ( 
      'permission' => 
      $this->permissionmodel->read( $id )->row() ) 
    );
  }
  public final function updateUserPrivilege
  (
    $userId,
    $privilegeId, 
    $selected
  )
  {
    $b = $this->permissionmodel->updateUserPrivilege
    (
      $userId,
      $privilegeId, 
      $selected
    );
    showJsonView(array('success' => $b));
  }
  public final function updateUserPermission
  (
    $userId,
    $privilegeId, 
    $permissionId,
    $selected
  )
  {
    $b = $this->permissionmodel->updateUserPermission
    (
      $userId,
      $privilegeId, 
      $permissionId,
      $selected
    );
    showJsonView(array('success' => $b));
  }
  public final function update( $id = null ) 
  {
    $i = $this->input;
    if ( $i->post() ) 
    {
      if ( $this->form_validation->run('permission') ) 
      {
        $o = $this->permissionmodel->read( $i->post('id') )->row();
        $a = array( 'permission' => $o );
        $b = $this->permissionmodel->update();
        if ( $b ) {
          redirect( site_url( 'permission/update/' . $o->id ) );
        }
        else {
          show_error( 'Error updating permission.' );
        }
      }
      else {
        showView( 'auth/permissions/update', $a );
      }
    }
    else 
    {
      $o = $this->permissionmodel->read( $id )->row();
      $a = array( 'permission' => $o );
      showView( 'auth/permissions/update', $a );
    }
  }
  public final function delete( $id ) {
    $this->permissionmodel->delete( $id );
    redirect(site_url('permission'));
  }
}
