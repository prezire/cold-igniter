<div id="privilege" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Name</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($privileges as $p){ ?>      
			<tr>
									<td><?php echo $p->id; ?></td>
									<td><?php echo $p->name; ?></td>
								<td>
					<a href="<?php echo site_url('privilege/read/' . $p->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('privilege/update/' . $p->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('privilege/delete/' . $p->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>