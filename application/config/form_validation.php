<?php

  $config = array
  (
    'auth/login' => array
    (
      array
      (
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|trim|xss_clean'
      ),
      array
      (
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim|xss_clean|min_length[1]'
      )
    )
  );