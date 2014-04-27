<div id="<?php echo $entity; ?>" class="create">
  <?php $ctrl = str_replace('_', '', $entity); ?>
  <?php echo '<?php'; ?> 
    echo validation_errors();
    echo form_open('<?php echo $ctrl; ?>/create'); 
    <?php echo '?>'; ?>
    <?php foreach($fields as $f){ ?>
      
      <?php echo humanize($f['name']); ?>: <?php echo $f['field']; ?>
      
    <?php } ?>
    <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>'); <?php echo '?>'; ?>">Cancel</a> | 
    <button>Create</button>
  </form>
</div>