<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Privilege extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    validateLoginSession();
    $this->load->model( 'privilegemodel' );
  }
  public final function index() {
    $o = $this->privilegemodel->index()->result();
    showView( 'auth/privileges/index', array( 'privileges' => $o ) );
  }
  public final function create() {
    if ( $this->input->post() ) {
      if ( $this->form_validation->run('privilege') ) {
        $o = $this->privilegemodel->create()->row();
        if ( $o->id ) {
          redirect( site_url( 'privilege/update/' . $o->id ) );
        }
        else {
          show_error( 'Error creating privilege.' );
        }
      }
      else {
        showView( 'auth/privileges/create' );
      }
    }
    else {
      showView( 'auth/privileges/create' );
    }
  }
  public final function read( $id ) {
    showView( 'privileges/read', array( 'privilege' => $this->privilegemodel->read( $id )->row() ) );
  }
  public final function update( $id = null ) {
    $o = $this->privilegemodel->read( $id )->row();
    $a = array( 'privilege' => $o );
    if ( $this->input->post() ) {
      if ( $this->form_validation->run('privilege') ) {
        $this->privilegemodel->update();
        redirect( site_url( 'privilege/update/' . $this->input->post('id') ) );
      }
      else {
        showView( 'auth/privileges/update', $a );
      }
    }
    else {
      showView( 'auth/privileges/update', $a );
    }
  }
  public final function delete( $id ) {
    $this->privilegemodel->delete( $id );
    redirect(site_url('privilege'));
  }
}
