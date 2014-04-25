<div id="sub_page" class="index">
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Description</th>
									<th>Enabled</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<tr>
									<td><?php echo $subPage->id; ?></td>
									<td><?php echo $subPage->title; ?></td>
									<td><?php echo $subPage->description; ?></td>
									<td><?php echo $subPage->enabled; ?></td>
								<td>
					<a href="<?php echo site_url('subpage/read/' . $subPage->$id); ?>">View</a> | 
					<a href="<?php echo site_url('subpage/update/' . $subPage->$id); ?>">Update</a> | 
					<a href="<?php echo site_url('subpage/delete/' . $subPage->$id); ?>">Delete</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>