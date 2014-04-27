<?php 
	echo '<?php';
	$meths = array('create', 'read', 'update');
?>

$config = array
(
	<?php 
		$i = count($meths);
		for($a = 0; $a < $i; $a++)
		{ 
			$m = $meths[$a];
	?>
	'<?php echo $entity . '/' . $m; ?>' => array
	(
		array
		(
			'field' => '',
			'label' => '',
			'rules' => ''
		)
	)<?php if($a < $i - 1){ ?>,
	<?php } ?>
	<?php } ?>
	
);