<div id="applicant_comment" class="index">
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Commenter User Id</th>
									<th>Applicant User Id</th>
									<th>Date</th>
									<th>Comment</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($applicantComment as $a){ ?>      
			<tr>
				<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Invalid argument supplied for foreach()</p>
<p>Filename: cruds/index.php</p>
<p>Line Number: 22</p>

</div>				<td>
					<a href="<?php echo site_url('applicantcomment/read/' . $a->id); ?>">View</a> | 
					<a href="<?php echo site_url('applicantcomment/update/' . $a->id); ?>">Update</a> | 
					<a href="<?php echo site_url('applicantcomment/delete/' . $a->id); ?>">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>