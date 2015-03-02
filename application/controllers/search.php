<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Search extends CI_Controller 
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('searchmodel');
    }
    private final function getSearchableTables()
    {
      //TODO: Set your desired searchable tables here...
      //Basic searchable tables.
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
          'descriptions' => array('email', 'description', 'country')
        )
      );
      return $tables;
    }
    public final function result()
    {
      if($this->input->post())
      {
        if($this->validation->run('search'))
        {
          $results = array();
          $tables = $this->getSearchableTables();
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
        else
        {
          showView('searches', array('status' => 'error', 'messsage' => 'Empty.'));
        }
      } 
    }
  	public final function index(){showView('searches/index');}
}