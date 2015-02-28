<div id="file" class="index row">
  <h4>Files</h4>
  	<a href="<?php echo base_url('file/create'); ?>" class="button tiny">New File</a>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Filename</th>
				<th>Description</th>
				<th>Owner User Id</th>
				<th>Date Time Created</th>
				<th>Enabled</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($files as $f){ ?>      
			<tr>
				<td><?php echo $f->id; ?></td>
				<td><?php echo $f->name; ?></td>
				<td><?php echo $f->filename; ?></td>
				<td><?php echo $f->description; ?></td>
				<td><?php echo $f->owner_user_id; ?></td>
				<td><?php echo $f->date_time_created; ?></td>
				<td><?php echo $f->enabled; ?></td>
				<td>
					<a href="<?php echo site_url('file/update/' . $f->id); ?>" class="button tiny">Update</a>
					<a href="<?php echo site_url('file/delete/' . $f->id); ?>" class="button tiny alert delete">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>