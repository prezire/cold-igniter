function Auth()
{
	this.baseUrl;
	this.init = function()
	{
		this.setListeners();
		this.fetchPrivileges();
	};
	this.fetchPrivileges = function()
	{
		var o = this;
		var i = $('.ddUsers');
		var url = this.baseUrl + 
				'/privilege/readUserPrivilegeDetailsByUserId/' + 
				i.val();
		$.ajax
		(
			{
				url: url,
				type: 'GET',
				success: function(response)
				{
					var r = response;
					var s = '';
					for(var a = 0; a < r.privileges.length; a++)
					{
						var p = r.privileges[a];
						s += '<li>' + p.privilege.name;
						var privilegeId = p.privilege.id;
						var t = '<br />Permissions<br />';
						for(var b = 0; b < p.permissions.length; b++)
						{
							var perms = p.permissions[b];
							var permName = perms.name;
							var privName = p.privilege.name;
							var loweredPrivName = privName.charAt(0).toLowerCase() + 
											privName.slice(1);
							var id = loweredPrivName + permName;
							var sChecked = perms.selected > 0 ? 'checked' : '';
							t += '<input type="checkbox" ' + 
											'privilegeId="' + privilegeId + '" ' + 
											'permissionId="' + perms.id + '" ' +
											'id="' + id + 
											'" value="' + permName + '" ' + 
											sChecked + '/ >' +
									'<label for="' + 
										id + 
										'">' + 
										permName + 
									'</label>';
						}
						s += t + '</li>';
					}
					var u = $('.privileges ul');
					u.html('');
					u.append(s);
					//
					o.reInitCbEvt();
				}
			}
		);
	};
	this.reInitCbEvt = function(){
		var o = this;
		$('.privileges ul input[type="checkbox"]').change
		(
			function()
			{
				var t = $(this);
				var b = t.is(":checked");
				var privId = t.attr('privilegeId');
				var permId = t.attr('permissionId');
				var url = o.baseUrl + 
							'/permission/updateByPrivilegeId/' + 
							permId + '/' + 
							privId + '/' + 
							b;
				$.ajax({
					url: url,
					type: 'GET',
					success: function(response)
					{
						var r = response;
						console.log(r);
						$('.alert-box').prepend('Permission was uccessfully updated.');
					}
				}
			)
		});
	};
	this.setListeners = function()
	{
		var o = this;
		$('.ddUsers').click(function(){
			o.fetchPrivileges();
		});
		$('.cbUse').click(function(e){
			e.preventDefault();
			var t = $(this);
			var b = t.is(':checked');
		});
		$('.cbPermit').click(function(e){
			e.preventDefault();
			var t = $(this);
			var b = t.is(':checked');
		});
	};
}