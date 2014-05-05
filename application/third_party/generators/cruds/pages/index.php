<div id="page" class="index">
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Name</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<tr>
									<td><?php echo $page->id; ?></td>
									<td><?php echo $page->name; ?></td>
								<td>
					<a href="<?php echo site_url('page/read/' . $page->$id); ?>">View</a> | 
					<a href="<?php echo site_url('page/update/' . $page->$id); ?>">Update</a> | 
					<a href="<?php echo site_url('page/delete/' . $page->$id); ?>">Delete</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>