			<footer class="section fp-auto-height grey background--grey">
				<div class="container">
					<h2>Contact us</h2>
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
		<?php if(is_front_page()) : ?>
			</div>
		<?php endif; ?>
		<?php echo do_shortcode('[do_widget id=custom_html-3]');?>
		<?php wp_footer(); ?>
		<div id="contact-form-pop" style="display:none" class="animated-modal">
			<?php echo do_shortcode('[contact-form-7 id="254" title="Contact form EN"]'); /* Popup content */ ?>
		</div>

		<div id="callback-form-pop" style="display:none" class="animated-modal">
			<?php echo do_shortcode('[contact-form-7 id="253" title="Callback EN"]'); /* Popup content */ ?>
			<input type="time" name="time" value="" id="callbacktime" class="form-control" placeholder="--:--" maxlength="5" onKeyPress="formatTime(this)" />
		</div>
		<!-- Modal -->
		<div class="modal fade" id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<i class="modal-close"></i>
					<div class="modal-header">
						<h2 class="modal-title" id="exampleModalLabel">Shopping basket</h2>
					</div>
					<div class="modal-body">
						<table class="show-cart table"></table>
						<div class="total-price"><b>Total price:</b>  € <span class="total-cart"></span></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="modal-order btn button--white btn-more">Order now</button>
					</div>
					<div id="shop-form-pop" style="display:none">
						<?php echo do_shortcode('[contact-form-7 id="252" title="Contact form - Shop EN"]'); /* Popup content */ ?>
					</div>
				</div>
			</div>
		</div>
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