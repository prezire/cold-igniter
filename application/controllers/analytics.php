<?php 
  if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Analytics extends CI_Controller {
    public function __construct(){
      parent::__construct();
    }
  	public final function index(){showView('analytics/index');}
}