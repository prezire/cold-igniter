<div id="<?php echo $entity; ?>" class="read row">
  <h4><?php echo humanize($entity); ?></h4>
  <?php 
    $ctrl = str_replace('_', '', $entity);
    $cml = camelize($entity);
  ?>
  <div class="row">
<?php foreach($fields as $f){ ?>
  <div class="small-12 medium-12 large-12 columns">  
        <?php echo humanize($f['name']); ?>: <?php echo '<?php echo $' . $cml . '->' . $f['name'] . '; ?>'; ?>
    </div>
<?php } ?>
</div>
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>'); <?php echo '?>'; ?>" class="button tiny alert">Back</a>
      <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>/update'); <?php echo '?>'; ?>" class="button tiny">Update</a>
    </div>
  </div>
</div>