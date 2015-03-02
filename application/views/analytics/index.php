<div id="analytics" class="index">
	<h4>Analytics</h4>
	<div class="row">
		<input type="hidden" class="userId" value="<?php echo getLoggedUser()->id; ?>" />
		<div class="small-12 medium-12 large-5 columns">
			<input type="text" name="date_from" placeholder="Date From*" class="from datepicker" />
		</div>
		<div class="small-12 medium-12 large-5 columns">
			<input type="text" name="date_to" placeholder="Date To*" class="to datepicker" />
		</div>
		<div class="small-12 medium-12 large-2 columns">
			<button class="tiny">Generate</button>
		</div>
	</div>
	<div class="row generatedReport hide">
	  <div class="small-12 medium-12 large-12 columns">
	  	Generated Report
	  </div>
	  <div class="panel small-12 medium-12 large-12 columns">
	  </div>
	</div>
	<div class="row panel">
		<div class="small-12 medium-12 large-12 columns">
			Email Report
		</div>
		<div class="small-12 medium-12 large-3 columns">
			<select name="frequency" class="frequency">
				<option>Daily</option>
				<option>Weekly</option>
				<option>Monthly</option>
			</select>
		</div>
		<div class="small-12 medium-12 large-4 columns">
			<input type="text" name="title" class="title" placeholder="Title*" />
		</div>
		<div class="small-12 medium-12 large-4 columns">
			<input type="text" name="recipients" class="recipients" placeholder="Recipients. Comma-separated emails" />
		</div>
		<div class="small-12 medium-12 large-1 columns">
			<button class="tiny btnSave">Save</button>
		</div>
		<div class="small-12 medium-12 large-12 columns">
			Recipients
			<div class="saved panel"></div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			var a = new Analytics();
			a.siteUrl = '<?php echo site_url(); ?>';
			a.init();
		});
	</script>
</div>