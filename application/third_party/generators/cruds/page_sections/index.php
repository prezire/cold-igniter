<div id="page_section" class="index">
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
									<td><?php echo $pageSection->id; ?></td>
									<td><?php echo $pageSection->name; ?></td>
								<td>
					<a href="<?php echo site_url('pagesection/read/' . $pageSection->$id); ?>">View</a> | 
					<a href="<?php echo site_url('pagesection/update/' . $pageSection->$id); ?>">Update</a> | 
					<a href="<?php echo site_url('pagesection/delete/' . $pageSection->$id); ?>">Delete</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>