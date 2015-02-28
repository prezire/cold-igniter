<div id="user" class="create row">
  <h4>New User</h4>
  <?php
    echo validation_errors();
    echo form_open('user/create');
  ?>
  <div class="row">
    
    
    <div class="small-12 medium-12 large-6 columns">Enabled: <input type="checkbox" name="enabled" /></div>
    <div class="small-12 medium-12 large-6 columns">
      Avatar: 
      <i class="step fi-torsos-male-female size-36"></i>
      <input type="file" name="avatar" />
    </div>
    <div class="small-12 medium-12 large-6 columns">Full Name: <input type="text" name="full_name" /></div>
    <div class="small-12 medium-12 large-6 columns">Title: <?php echo form_dropdown('title', $titles); ?></div>
    <div class="small-12 medium-12 large-6 columns">Email: <input type="email" name="email" /></div>
    <div class="small-12 medium-12 large-6 columns">Password: <input type="password" name="password" /></div>
    <div class="small-12 medium-12 large-12 columns">Description: <textarea name="description"></textarea></div>
    <div class="small-12 medium-12 large-6 columns">Date Of Birth: <input type="text" class="datepicker" name="date_of_birth" /></div>
    <div class="small-12 medium-12 large-6 columns">Address: <input type="text" name="address" /></div>
    <div class="small-12 medium-12 large-6 columns">City: <input type="text" name="city" /></div>
    <div class="small-12 medium-12 large-6 columns">State: <input type="text" name="state" /></div>
    <div class="small-12 medium-12 large-6 columns">Country: <?php echo form_dropdown('country', getCountries()); ?></div>
    <div class="small-12 medium-12 large-6 columns">Zip Code: <input type="text" name="zip_code" /></div>
    <div class="small-12 medium-12 large-6 columns">Landline: <input type="text" name="landline" /></div>
    <div class="small-12 medium-12 large-6 columns">Mobile: <input type="text" name="mobile" /></div>
  </div>
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo site_url('user'); ?>" class="button tiny alert">Cancel</a>
      <button class="button tiny">Create</button>
    </div>
  </div>
</form>
</div>