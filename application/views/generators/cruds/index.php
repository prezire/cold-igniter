<div id="<?php echo $entity; ?>" class="index">
	<table>
		<thead>
			<tr>
				<?php foreach($fields as $f){ ?>
					<th><?php echo humanize($f['name']); ?></th>
				<?php } ?>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php 
					$ctrl = str_replace('_', '', $entity);
					$cml = camelize($entity);
					foreach($fields as $f)
					{
				?>
					<td><?php echo '<?php echo $' . $cml . '->' . $f['name'] . '; ?>'; ?></td>
				<?php } ?>
				<td>
					<a href="<?php echo "<?php echo site_url('$ctrl" . "/read/' . $" . "$cml" . "->" . '$id); ?>'; ?>">View</a> | 
					<a href="<?php echo "<?php echo site_url('$ctrl" . "/update/' . $" . "$cml" . "->" . '$id); ?>'; ?>">Update</a> | 
					<a href="<?php echo "<?php echo site_url('$ctrl" . "/delete/' . $" . "$cml" . "->" . '$id); ?>'; ?>">Delete</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>