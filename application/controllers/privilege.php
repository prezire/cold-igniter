<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Privilege extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model( 'privilegemodel' );
  }
  public final function index() {
    $o = $this->privilegemodel->index()->result();
    showView( 'privileges/index', array( 'privileges' => $o ) );
  }
  public final function create() {
    if ( $this->input->post() ) {
      if ( $this->form_validation->run() ) {
        $o = $this->privilegemodel->create()->row();
        if ( $o->id ) {
          redirect( site_url( 'privilege/read/' . $o->id ) );
        }
        else {
          show_error( 'Error creating privilege.' );
        }
      }
      else {
        showView( 'privileges/create' );
      }
    }
    else {
      showView( 'privileges/create' );
    }
  }
  public final function read( $id ) {
    showView( 'privileges/read', array( 'privilege' => $this->privilegemodel->read( $id )->row() ) );
  }
  public final function readUserPrivilegeDetailsByUserId($userId)
  {
    $a = array('privileges' => $this->privilegemodel->readPrivilegeDetailsByUserId($userId));
    showJsonView($a);
  }
  public final function update( $id = null ) {
    $o = $this->privilegemodel->read( $id )->row();
    $a = array( 'privilege' => $o );
    if ( $this->input->post() ) {
      if ( $this->form_validation->run() ) {
        $b = $this->privilegemodel->update()->row();
        if ( $b ) {
          redirect( site_url( 'privilege/read/' . $o->id ) );
        }
        else {
          show_error( 'Error updating privilege.' );
        }
      }
      else {
        showView( 'privileges/update', $a );
      }
    }
    else {
      showView( 'privileges/update', $a );
    }
  }
  public final function delete( $id ) {
    showJsonView( array( 'privilege' => $this->privilege_model->delete( $id )->row() ) );
  }
}
