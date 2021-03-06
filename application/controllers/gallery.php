<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Gallery extends CI_Controller {
    public function __construct(){
      parent::__construct();
      validateLoginSession();
      $this->load->model('gallerymodel');
    }
  	public final function index()
    {
      $i = $this->gallerymodel->index()->result();
      showView('galleries/index', array('images' => $i));
    }
    public final function create()
    {
      if($this->input->post())
      {
        $this->gallerymodel->create();
        redirect(site_url('gallery'));
      }
    }
    public final function read(){}
    public final function update($id = null)
    {
      if($this->input->post())
      {
        $this->gallerymodel->update();
        redirect(site_url('gallery/update/' . $this->input->post('id')));
      }
      else
      {
        $i = $this->gallerymodel->read($id)->row();
        $a = array('image' => $i);
        showView('galleries/update', $a);
      }
    }
    public final function delete($id)
    {
      $f = $this->gallerymodel->read($id)->row()->filename;
      $s = 'public/uploads/' . $f;
      $b = unlink($s);
      if($b)
      {
        $this->gallerymodel->delete($id);
        redirect(site_url('gallery'));
      }
    }
}