$(document).ready(function(){
  function fbOnStatusChange(response)
  {
    if(response.status == 'connected')
    {
      //Logged into your app and Facebook.
      fbOnLoginSuccess(response);
    } 
    else if(response.status == 'not_authorized')
    {
      //Logged into Facebook, but not your app.
      //$('#status').innerHTML = 'Please log into this app.';
      fbLogin();
    } 
    else 
    {
      //Not logged into Facebook, so we're not sure if
      //they are logged into this app or not.
      //$('#status').innerHTML = 'Please log into Facebook.';
      fbLogin();
    }
  }
  function fbOnLoginSuccess(response)
  {
    console.log('Welcome! Fetching your information...');
    var token = response.authResponse.accessToken;
    var userId = response.authResponse.userID;//FB UID
    //console.log(token, userId);
    FB.api('/me', function(response){
      var email = response.email;
      var name = response.name;
      console.log('Thanks for logging in, ' + name + '!');
      //Send to server-side and create a session using params.
      //$.ajax({url: 'auth/fbLogin/' + email + '/' + name + '/' + userId, success: function(response){}});
    });
  }
  function fbLogin(permissions)
  {
    FB.login(function(response)
    {
      if(response.authResponse)
      {
        fbOnLoginSuccess(response);
      } 
      else 
      {
        //User hit cancel button.
        console.log('User cancelled login or did not fully authorize.');
      }
    }, 
      {scope: permissions}
    );
  }
  function fbCheckLoginStatus()
  {
    FB.getLoginStatus(function(response){
      fbOnStatusChange(response);
    });
  }
  //Dependent on Open Graph (OG) Meta tags.
  //https://developers.facebook.com/docs/sharing/reference/share-dialog
  function fbShareDialog()
  {
    //
  }
  //Dependent on GET Parameters.
  //https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.2
  function fbFeedDialog()
  {
    //
  }
  //
  window.fbAsyncInit = function(){
    FB.init({
      appId      : '748620185222813',
      //Enable cookies to allow the server to access the session.
      cookie     : true,
      //Parse social plugins on this page.
      xfbml      : true,
      version    : 'v2.1'
    });
  };
  //Load the SDK asynchronously.
  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  //
  $('.btnFb').click(function(e){
    //<a class="btnFb" permissions="public_profile,email,user_location,user_birthday">FB Login</a>
    e.preventDefault();
    fbCheckLoginStatus($(this).attr('permissions'));
  });
});