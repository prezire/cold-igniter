<div id="comment" class="index row">
  <h4>Comments</h4>
  	<a href="<?php echo base_url('comment/create'); ?>" class="button tiny">New Comment</a>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Page Id</th>
				<th>Message</th>
				<th>From User Id</th>
				<th>Date Time Posted</th>
				<th>Approved</th>
				<th>Approved By User Id</th>
				<th>Enabled</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($comments as $c){ ?>      
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->page_id; ?></td>
				<td><?php echo $c->message; ?></td>
				<td><?php echo $c->from_user_id; ?></td>
				<td><?php echo $c->date_time_posted; ?></td>
				<td><?php echo $c->approved; ?></td>
				<td><?php echo $c->approved_by_user_id; ?></td>
				<td><?php echo $c->enabled; ?></td>
				<td>
					<a href="<?php echo site_url('comment/update/' . $c->id); ?>" class="button tiny">Update</a>
					<a href="<?php echo site_url('comment/delete/' . $c->id); ?>" class="button tiny alert delete">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>