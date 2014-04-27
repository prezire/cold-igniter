<?php
  class PayPal extends CI_Controller
  {
    public function __construct($displayErrors = 0)
    {
      parent::__construct();
      $this->load->model('productmodel');
      //
      ini_set('display_errors', $displayErrors);
      //
      $this->isValid() ? 
      $this->verifyIpn() : 
      log_message('info', 'Invalid PayPal.');
    }
    public final function transact()
    {
      $prod = $this->productmodel->transact()->row();
      if($prod->id > 0)
      {
        //Send an email to paying customer.
        $s = $this->parser->parse
        (
          'generators/paypal/product_emailer',
          array('product' => $prod),
          true
        );
        sendEmailer
        (
          'New Transaction',
          'from',
          'to',
          $s
        );
      }
      else
      {
        log_message('info', 'Error creating transaction.');
      }
    }
    //@meth   confirm   Post back to PayPal system to validate.
    private final function confirm($queryString)
    {
      $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
      $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
      $header .= 'Content-Length: ' . strlen($queryString) . "\r\n\r\n";
      $fp = fsockopen('www.paypal.com', 80, $errno, $errstr, 30) 
      //or fatal_error(__FILE__, __LINE__, "Can't open socket. $errstr (err no:$errno)");
      fputs($fp, $header . $queryString) 
      //or fatal_error(__FILE__, __LINE__, "Error while writing to socket.");
      while(!feof($fp))
      {
        $res = fgets ($fp, 1024);
        if(strcmp($res, 'VERIFIED') == 0) 
        {
          return true;
        }
        else if(strcmp($res, 'INVALID') == 0)
        {
          log_message('info', 'PayPal return INVALID');
        }
      }
      fclose($fp);
    }
    private final function isValid()
    {
      //Read the post from PayPal system and add 'cmd'.
      $cmd = 'cmd=_notify-validate';
      $queryString = $cmd;
      foreach($_REQUEST as $key => $value) 
      {
        $value = urlencode(stripslashes($value));
        $queryString .= "&$key=$value";
      }
      $data = str_replace($cmd . '&', '', $queryString);
      log_message('info', 'PayPal cmd data: ' . $data);
      //
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, 'https://www.paypal.com/cgi-bin/webscr');
      curl_setopt($curl, CURLOPT_HEADER, 0);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $queryString);
      //
      if(!($result = curl_exec($curl)))
      {
        log_message('info', 'curl_exec: ' . curl_error($curl));
        return false;
      }
      curl_close($curl);
      //
      if(eregi('VERIFIED', $result))
      {
        return true;
      }
      else 
      {
        error_log
        (
          "PayPal return INVALID. 
          Data: $data. 
          cURL result: $result"
        );
        return false;
      }
    }
    //A public callback that PayPal can trigger
    //when a transaction is successful.
    private final function verifyIpn()
    {
      /*
        Useful PayPal IPN params:
        $_POST['payer_email']       = 'paypal@email.account.com'
        $_POST['option_selection1'] = 'email@email.com'
        $_POST['option_selection2'] = 'ppc name';
        $_POST['first_name']        = 'first';
        $_POST['last_name']         = 'last';
        $_POST['item_number']       = 'TG123';
        $_POST['payment_status']    = 'Completed';
        $_POST['mc_gross']          = '14.97';
        $_POST['mc_currency']       = 'SGD';
      */
      $i = $this->input;
      $errMsg = null;
      $prod = $this->productmodel->getByCode()->row();
      if($prod->id < 1)
      {
        $errMsg = 'Product does not exist.';
      }
      else if
      (
        $i->post('payment_status') != 'Completed' || 
        $i->post('payment_status') != 'Refunded'
      )
      {
        $errMsg = 'Status not completed.';
      }
      else
      {
        //No errors. Continue with transaction.
        $this->transact();
      }
      //
      if($errMsg)
      {
        //Something went wrong. Notify admin.
        $s = $this->parser->parse
        (
          'generators/paypal/error_emailer',
          array('errorMessage' => $errMsg),
          true
        );
        sendEmailer
        (
          'Invalid Payment',
          'from',
          'to',
          $s
        );
        exit;
      }
    }
  }
?>