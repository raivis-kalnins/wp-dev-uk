			<footer class="section fp-auto-height grey background--grey">
				<div class="container">
					<h2><?php the_field('contact_title'); ?></h2>
					<div class="row">
						<div class="col">
							<div class="email fa fa-envelope">
								<i class="getemail" data-part1="hello" data-part2="ojcars" data-part3="co.uk">hello<i class="email"></i></i>
							</div>
							<div class="call">
								<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;<a href="tel:00441604622491" target="_blank">+44(0)7742&nbsp;800761</a>
							</div>
							<div class="call">
								<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;<a href="tel:00441604622491" target="_blank">+44(0)7741&nbsp;114296</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<span class="copyright">Copyright &copy; 2015 - <?php echo date('Y'); ?> O&J cars LTD</span>
							<i id="f-key"><?php echo do_shortcode('[do_widget id=custom_html-2]');?></i>
						</div>
					</div>
				</div>
				<div id="scroll-top"><a href="#hello" title="Scroll to top"><i class="fa fa-arrow-circle-o-up fa-3x" aria-hidden="true"></i></a></div>
			</footer>
		</div>
		<?php echo do_shortcode('[do_widget id=custom_html-3]');?>
		<?php wp_footer(); ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151333821-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-151333821-1');
		</script>
	</body>
</html>