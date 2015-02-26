<div id="<?php echo $entity; ?>" class="index row">
  <h4><?php $title = humanize(plural($entity)); echo $title; ?></h4>
  	<a href="<?php echo '<?php echo base_url(\'' . $entity . '/create\'); ?>'; ?>" class="button radius small">New <?php echo singular($title); ?></a>
	<table>
		<thead>
			<tr>
				<?php foreach($fields as $f){ ?><th><?php echo humanize($f['name']); ?></th>
				<?php } ?><th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php
        $ctrl = str_replace('_', '', $entity);
				$cml = camelize($entity);
        //
        $first = substr($cml, 0, 1);
        echo '<?php foreach($' . plural($cml) . ' as $' . $first . '){ ?>';
      ?>
      
			<tr>
				<?php 
					foreach($fields as $f)
					{
				?><td><?php echo '<?php echo $' . $first . '->' . $f['name'] . '; ?>'; ?></td>
				<?php } ?><td>
					<a href="<?php echo "<?php echo site_url('$ctrl" . "/read/' . $" . "$first" . "->" . 'id); ?>'; ?>" class="button radius small">View</a>
					<a href="<?php echo "<?php echo site_url('$ctrl" . "/update/' . $" . "$first" . "->" . 'id); ?>'; ?>" class="button radius small">Update</a>
					<a href="<?php echo "<?php echo site_url('$ctrl" . "/delete/' . $" . "$first" . "->" . 'id); ?>'; ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php echo '<?php } ?>'; ?>
      
		</tbody>
	</table>
</div>