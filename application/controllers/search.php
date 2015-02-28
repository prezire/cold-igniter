<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Search extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('searchmodel');
    }
  	public final function index(){
      if($this->input->post())
      {
        $r = $this->searchmodel->search();
        showView('searches/results', array('results' => $r));
      }
      else
      {
        showView('searches/index');
      }
    }
}