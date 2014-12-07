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
  function isPermitted($permissionName)
  {
    $CI = get_instance();
    $uId = getLoggedUser()->id;
    $CI->db->select('id');
    $CI->db->from('permitted_roles pr');
    $CI->db->join('roles r', 'r.id = pr.role_id');
    $CI->db->join('users u', 'u.role_id = r.id');
    $CI->db->join('permissions p', 'p.id = pr.permission_id');
    $CI->db->where('r.id', $uId);
    $CI->db->where('p.name', $permissionName);
    $CI->db->get();
    return $CI->db->num_rows() > 0;
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