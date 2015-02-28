function Auth()
{
	this.siteUrl;
	this.init = function()
	{
		this.setListeners();
	};
	this.setListeners = function()
	{
		var o = this;
		$('#loginAs button').click(function(e) {
			e.preventDefault();
			var m = $('#loginAs input[type="email"]').val();
			var p = $('#loginAs input[type="password"]').val();
			var d = {email: m, password: p};
			$.ajax({
				url: o.siteUrl + '/auth/loginAs',
				type: 'POST', 
				data: d,
				success: function(response){
					if(response.status == 'success')
					{
						document.location.href = o.siteUrl + 
												'/user/update/' + 
												response.user_id
					}
					else
					{
						//Show error.
					}
				}
			});
		});
		$('#permission.userPermission .privilege input').on
		(
			'change', 
			function()
			{
				var t = $(this);
				var p = t.parent().parent();
				var uId = p.attr('userId');
				var privId = p.attr('privilegeId');
				var bChecked = t.is(':checked');
				var perms = p.find('.permissions input');
				var url = o.siteUrl + 
						'/permission/updateUserPrivilege/' +
						uId + '/' + 
						privId + '/' + 
						bChecked;
				perms.prop('checked', bChecked);
				$.ajax
				(
					{
						url: url,
						success: function(response)
						{
							if(response.status == 'success')
							{
								//
							}
							else
							{
								//
							}
						}
					}
				);
			}
		);
		$('#permission.userPermission .permissions input').on
		(
			'change', 
			function()
			{
				var t = $(this);
				var p = t.parent().parent().parent();
				var uId = p.attr('userId');
				var permId = t.attr('id');
				var privId = p.attr('privilegeId');
				var bChecked = t.is(':checked');
				var url = o.siteUrl + 
						'/permission/updateUserPermission/' +
						uId + '/' + 
						privId + '/' + 
						permId + '/' + 
						bChecked;
				$.ajax
				(
					{
						url: url,
						success: function(response)
						{
							if(response.status == 'success')
							{
								//
							}
							else
							{
								//
							}
						}
					}
				);
			}
		);
	};
}