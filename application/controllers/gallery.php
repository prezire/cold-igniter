<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Gallery extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('gallerymodel');
    }
  	public final function index()
    {
      $i = $this->gallerymodel->index()->result();
      showView('galleries/index', array('images' => $i));
    }
}