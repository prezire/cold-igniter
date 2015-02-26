function ColdIgniter()
{
	this.siteUrl;
	this.init = function()
	{
		this.setListeners();
	};
	this.setListeners = function()
	{
		var o = this;
		$('.delete').click(function(e){
			if(!confirm('Are you sure?'))
			{
				e.preventDefault();
			}
		});
	};
}