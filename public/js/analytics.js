function Analytics()
{
	this.siteUrl;
	this.init = function(){
		this.setListeners();
	};
	this.setListeners = function(){
		var o = this;
		$('#analytics.index .save').click(function(e){
			$.ajax({
				url: o.siteUrl + '/analytics/save',
				data: {param1: 'value1'},
				success: function(response){
					if(response.status == 'success')
					{

					}
				}
			});
		});
		$('#analytics.index .generate').click(function(e){
			e.preventDefault();
			var param = 
			{
				date_from: $('#analytics .dateFrom').val(),
				date_to: $('#analytics .dateTo').val()
			};
			$.ajax({
				url: o.siteUrl + '/analytics/generate',
				data: param,
				success: function(response){
					if(response.status == 'success')
					{
						
					}
				}
			});
		});
	};
}