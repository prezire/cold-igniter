<!DOCTYPE HTML>
<html>
	<?php echo $this->load->view('commons/partials/header', null, true); ?>
	<body>
		<div id="bg"></div>	
		<div id="header">
			<?php echo $this->load->view('commons/partials/nav', null, true); ?>
			<div id="breadcrumb"><?php echo set_breadcrumb(); ?></div>
		</div>
		<div id="container">