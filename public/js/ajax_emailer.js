$(document).ready(function(){
	function AjaxEmailer()
	{
		this.init = function(){
			this.initListeners();
		};
		this.initListeners = function(){
			this.initMailChimp();
		};
		//Private methods.
		this.initMailChimp = function(){
			/*
				The URL is using post-json?u=...&id=...c=? 
				instead of just post?u=...&id=... taken from the generated <form> tag.
				Don't forget the question mark symbol at the end of the string.

				If your form requires a name text field, just add it in your form
				with any value like value="Subscriber" and hide it using CSS.
			*/
			$('#mc_embed_signup input.button').click(function(e){
			$.ajax
			(
				{
					url: 'http://.../subscribe/post-json?u=...&id=...&c=?', 
					type: 'GET',
					data: $('#mc_embed_signup form').serialize(),
					dataType: 'JSON',
					contentType: 'application/json; charset=utf-8',
					error: function(error) 
					{
		    			console.log('error: ', error);
						$('#home .mailingList .error').fadeIn('slow').delay(3000).fadeOut('slow');
					},
					success: function(response)
					{
					    console.log('success: ', response);
					    $('#home .mailingList .success').html('Check your email for verification.');
					    $('#home .mailingList .success').fadeIn('slow').delay(3000).fadeOut('slow');
					}
				}
			);
			e.preventDefault();
		});
		};
	}
	new AjaxEmailer().init();
});