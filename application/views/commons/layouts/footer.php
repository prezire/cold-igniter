				</div>
			</div><!-- /.row -->
		</div><!-- /#container -->
		<div class="row">
		  <div class="small-12 medium-12 large-12 columns">
		  	<footer>
				Copyright &copy; 2015 ColdIgniter by 
				<a href="http://www.simplifie.net" target="_blank">Simplifie</a>. All Rights Reserved.
			</footer>
		  </div>
		</div>
    <script src="<?php echo base_url('public/libs/foundation-5.4.7/js/foundation.min.js'); ?>"></script>
    <script>
      $(document).foundation();
      $(document).ready(function(){
      	var c = new ColdIgniter();
      	var siteUrl = '<?php echo site_url(); ?>';
      	c.siteUrl = siteUrl;
      	c.init();
      	$('img').parent().imgLiquid();
      	$('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
      	var a = new Auth();
		a.siteUrl = siteUrl;
		a.init();
      });
    </script>
	</body>
</html>