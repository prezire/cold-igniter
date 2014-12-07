<div id="role" class="index row">
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
      <?php foreach($roles as $r){ ?>      
			<tr>
									<td><?php echo $r->id; ?></td>
									<td><?php echo $r->name; ?></td>
								<td>
					<a href="<?php echo site_url('role/read/' . $r->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('role/update/' . $r->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('role/delete/' . $r->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>