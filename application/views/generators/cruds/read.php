<div id="<?php echo $entity; ?>" class="read row">
  <h4></h4>
  <?php 
    $ctrl = str_replace('_', '', $entity);
    $cml = camelize($entity);
  ?>
    <?php foreach($fields as $f){ ?>
      
      <?php echo humanize($f['name']); ?>: <?php echo '<?php echo $' . $cml . '->' . $f['name'] . '; ?>'; ?>
      
    <?php } ?>
    <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>'); <?php echo '?>'; ?>" class="button radius small alert">Back</a>
    <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>/update'); <?php echo '?>'; ?>" class="button radius small">Update</a>
  </form>
</div>