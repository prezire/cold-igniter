<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Search extends CI_Controller 
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('searchmodel');
    }
    public final function result()
    {
      if($this->input->post())
      {
        //Configurable search.
        $tables = array
        (
          array
          (
            'name' => 'roles',
            'fields' => array('name', 'description'),
            'orders' => array('name', 'ASC'),
            'href' => site_url('role/update'),
            'titles' => array('name'), 
            'descriptions' => array('description')
          ),
          array
          (
            'name' => 'users',
            'fields' => array('full_name', 'description', 'country'),
            'orders' => array('full_name', 'ASC'),
            'href' => site_url('user/update'),
            'titles' => array('title', 'full_name'), 
            'descriptions' => array('email', 'country')
          )
        );
        $results = array();
        foreach($tables as $t)
        {
          $r = $this->searchmodel->search($t);
          array_push($results, $r);
        }
        $a = array
        (
          'results' => $results,
          'keywords' => $this->input->post('keywords')
        );
        showView('searches/results', $a);
      } 
    }
  	public final function index(){showView('searches/index');}
}