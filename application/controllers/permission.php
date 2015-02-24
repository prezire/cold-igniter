<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Permission extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model( 'permissionmodel' );
  }

  public final function index(){}
  public final function userPermission() 
  {
    $this->load->model('usermodel');
    $a = $this->permissionmodel->readUserPermissions();
    $a['permissions'] = $this->permissionmodel->index()->result_array();
    showView( 'auth/permissions/index', $a );
  }
  public final function create() {
    if ( $this->input->post() ) {
      if ( $this->form_validation->run() ) {
        $o = $this->permissionmodel->create()->row();
        if ( $o->id ) {
          redirect( site_url( 'permission/read/' . $o->id ) );
        }
        else {
          show_error( 'Error creating permission.' );
        }
      }
      else {
        showView( 'permissions/create' );
      }
    }
    else {
      showView( 'permissions/create' );
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
  public final function updateUserPermissions
  (
    $userId,
    $privilegeId, 
    $permissionId,
    $selected
  )
  {
    $this->permissionmodel->updateUserPermissions
    (
      $userId,
      $privilegeId, 
      $permissionId,
      $selected
    );
    showJsonView(array('success' => true));
  }
  public final function update( $id = null ) {
    $o = $this->permissionmodel->read( $id )->row();
    $a = array( 'permission' => $o );
    if ( $this->input->post() ) {
      if ( $this->form_validation->run() ) {
        $b = $this->permissionmodel->update()->row();
        if ( $b ) {
          redirect( site_url( 'permission/read/' . $o->id ) );
        }
        else {
          show_error( 'Error updating permission.' );
        }
      }
      else {
        showView( 'permissions/update', $a );
      }
    }
    else {
      showView( 'permissions/update', $a );
    }
  }
  public final function delete( $id ) {
    showJsonView( array( 'permission' => $this->permission_model->delete( $id )->row() ) );
  }
}
