<?php
  function getPostValuePair($excludeList = array())
  {
    $CI = get_instance();
    $post = $CI->input->post();
    $list = array();
    foreach($post as $key => $value)
    {
      if(!in_array($key, $excludeList))
      {
        $list[$key] = $value;
      }
    }
    return $list;
  }
  /*
  * Serializes string-based URL params into array. The parameter 
  * must be at the last portion of the parameter list.
  * @param    $fromIndex    1-based index.
  * @return   array.
  */
  function getArrayParams($fromIndex)
  {
    $CI = get_instance();
    $a = $CI->uri->segment_array();
    $toIndex = count($a) - 1;
    $a = array_slice($a, $fromIndex, $toIndex);
    return $a;
  }
  function getLoggedUser()
  {
    $CI = get_instance();
    return $CI->session->userdata('user');
  }
  function isLoggedIn()
  {
    return getLoggedUser() != null;
  }
  function hasPrivilege($privilegeName)
  {
    $CI = get_instance();
    $CI->load->model('permissionmodel');
    $b = $CI->permissionmodel->readHasPrivilege($privilegeName);
    if($b) return true;
    else redirect(site_url('auth/login'));
  }
  /*
    Usage:
    //All permissions.
    if(hasPermissions('Page')){...}
    //Specific permissions.
    if(hasPermissions('Page', array('Create', 'Update'))){...}
  */
  function hasPermissions
  (
    $privilegeName, 
    $permissions = array('Create', 'Read', 'Update', 'Delete')
  )
  {
    $CI = get_instance();
    $CI->load->model('permissionmodel');
    $b = $CI->permissionmodel->readHasPermissions($privilegeName, $permissions);
    if($b) return true;
    else redirect(site_url('auth/login'));
  }
  function sendEmailer
  (
    $subject, 
    $from, 
    $to, 
    $message, 
    $cc = null,
    $bcc = null
  )
  {
    $CI = get_instance();
    $CI->email->from($from);
    $CI->email->to($to);
    $CI->email->bcc($cc);
    $CI->email->subject($subject);
    $CI->email->message($message);
    $CI->email->send();
  }