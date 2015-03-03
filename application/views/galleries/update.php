<div id="gallery" class="update">
	<h4>Update Gallery Image</h4>
	<?php echo form_open_multipart('gallery/update'); ?>
		<input type="hidden" name="id" value="<?php echo set_value('id', $image->id); ?>" />
		<div class="row">
		  <div class="small-12 medium-2 large-2 columns">
		  	<div class="image">
		  		<img src="<?php echo set_value('caption', base_url('public/uploads/' . $image->filename)); ?>" />
		  	</div>	
		  </div>
		  <div class="small-12 medium-10 large-10 columns">
		  	<input type="file" name="files[]" />
		  </div>
		  <div class="small-12 medium-10 large-10 columns">
		  	Caption:
		  	<input type="text" name="caption" value="<?php echo set_value('caption', $image->caption); ?>" />
		  </div>
		  <div class="small-12 medium-10 large-10 columns">
		  	Description:
		  	<textarea name="description"><?php echo set_value('description', $image->description); ?></textarea>
		  </div>
		</div>
		<div class="options small-12 medium-12 large-12 columns">
			<a href="<?php echo site_url('gallery'); ?>" class="button tiny alert">Back</a>
			<button class="tiny">Update</button>
		</div>
	</form>
</div>