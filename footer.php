        <footer class="c-site-footer">
        </footer>
	</div><!--/site-wrap-->
    <?php 
	/*
		Scripts
	*/
	echo '<div style="display:none;">' .get_option('code_snippets'). '</div>'; 
	
	/*
		GA Id
	*/
    $gaID = get_option('ga_ID'); 
	if($gaID) { ?>
	<!--Analytics-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '<?php echo esc_attr( get_option('ga_ID') ); ?>']);  
	  _gaq.push(['_trackPageview']);
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<!-- End Analytics -->
	<?php } 
	wp_footer();?>
  </body>
</html>