<?php echo '<?php'; ?>

  $config = array
  (
    'auth/login' => array
    (
      array
      (
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required'
      ),
      array
      (
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
      )
    )
  );