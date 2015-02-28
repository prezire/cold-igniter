<?php 
  if (!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Home extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('homemodel');
    }
  	public final function index(){showView('home');}
    public final function search()
    {
      if($this->input->post())
      {
        $r = $this->homemodel->search();
        showView('search_results', array('results' => $r));
      }
      else
      {
        showView('search');
      }
    }
}