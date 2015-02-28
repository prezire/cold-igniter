<div id="page" class="index row">
  <h4>Pages</h4>
  	<a href="<?php echo base_url('page/create'); ?>" class="button tiny">New Page</a>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Date Time Created</th>
				<th>Enabled</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($pages as $p){ ?>      
			<tr>
				<td><?php echo $p->id; ?></td>
				<td><?php echo $p->name; ?></td>
				<td><?php echo $p->description; ?></td>
				<td><?php echo $p->date_time_created; ?></td>
				<td><?php echo $p->enabled; ?></td>
				<td>
					<a href="<?php echo site_url('page/update/' . $p->id); ?>" class="button tiny">Update</a>
					<a href="<?php echo site_url('page/delete/' . $p->id); ?>" class="button tiny alert delete">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>