<!DOCTYPE HTML>
<html>
	<?php echo $this->load->view('commons/partials/header', null, true); ?>
	<body>
		<div id="bg"></div>	
		<div id="header">
			<?php echo $this->load->view('commons/partials/nav', null, true); ?>
			<div class="row">
				<div class="breadcrumb small-12 medium-12 large-12 columns">
					<div id="breadcrumb" class="breadcrumbs">
						<?php echo set_breadcrumb(); ?>
					</div>
				</div>
			</div>
		</div>
		<div id="container">
			<div class="row">
			  <div class="small-12 medium-12 large-12 columns">