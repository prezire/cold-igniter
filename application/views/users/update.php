<div id="user" class="update row">
  <h4>Update User</h4>
  <?php
    echo validation_errors();
    echo form_open('user/update');
  ?>
  <input type="hidden" name="id" value="<?php echo set_value('id', $user->id); ?>" />
  <div class="row">
    <div class="small-12 medium-12 large-6 columns">
      Enabled:
      <?php
        $iEnabled =  set_value('enabled',  $user->enabled);
        $bEnabled = $iEnabled;
        $sEnabled = $iEnabled ? 'enabled' : 'disabled';
        $data = array
        (
          'name' => 'enabled',
          'value' => $sEnabled,
          'checked' => $bEnabled,
        );
        echo form_checkbox($data);
      ?>
    </div>
    <div class="small-12 medium-12 large-6 columns">
      Avatar: 
      <img class="avatar" src="<?php echo base_url('public/uploads/' . $user->avatar_path); ?>" />
      <input type="file" name="avatar" />
    </div>
    <div class="small-12 medium-12 large-6 columns">Title: <?php echo form_dropdown('title', $titles, set_value('title', $user->title)); ?></div>
    <div class="small-12 medium-12 large-6 columns">Full Name: <input type="text" name="full_name" value="<?php echo set_value('full_name', $user->full_name); ?>" /></div>
    <div class="small-12 medium-12 large-6 columns">Email: <input type="email" name="email" value="<?php echo set_value('email', $user->email); ?>" /></div>
    <div class="small-12 medium-12 large-6 columns">Password: <input type="password" name="password" value="<?php echo set_value('password', $user->password); ?>" /></div>
    <div class="small-12 medium-12 large-12 columns">Description: <textarea name="description"><?php echo set_value('description', $user->description); ?></textarea></div>
    <div class="small-12 medium-12 large-6 columns">
      Role:
      <?php
        $aRoles = array();
        foreach($roles as $r)
        {
          $aRoles[$r['id']] = $r['name'];
        }
        echo form_dropdown('role_id', $aRoles, set_value('role_id', $user->role_id));
      ?>
    </div>
    <div class="small-12 medium-12 large-6 columns">Date Of Birth: <input type="text" name="date_of_birth" class="datepicker" value="<?php echo set_value('date_of_birth', $user->date_of_birth); ?>" /></div>
    <div class="small-12 medium-12 large-6 columns">Address: <input type="text" name="address" value="<?php echo set_value('address', $user->address); ?>" /></div>
    <div class="small-12 medium-12 large-6 columns">City: <input type="text" name="city" value="<?php echo set_value('city', $user->city); ?>" /></div>
    <div class="small-12 medium-12 large-6 columns">State: <input type="text" name="state" value="<?php echo set_value('state', $user->state); ?>" /></div>
    <div class="small-12 medium-12 large-6 columns">Country: <?php echo form_dropdown('country', getCountries(), set_value('country', $user->country)); ?></div>
    <div class="small-12 medium-12 large-6 columns">Zip Code: <input type="text" name="zip_code" value="<?php echo set_value('zip_code', $user->zip_code); ?>" /></div>
    <div class="small-12 medium-12 large-6 columns">Landline: <input type="text" name="landline" value="<?php echo set_value('landline', $user->landline); ?>" /></div>
    <div class="small-12 medium-12 large-6 columns">Mobile: <input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile); ?>" /></div>
  </div>
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo site_url('user'); ?>" class="button tiny alert">Cancel</a>
      <button class="button tiny">Update</button>
    </div>
  </div>
</form>
</div>