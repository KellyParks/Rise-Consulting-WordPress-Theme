			<footer>
				<div class="container">
					<!-- output contact form -->
					<?php dynamic_sidebar('form'); ?>
					<div>
						<!-- footer logo -->
						<?php dynamic_sidebar('footerimage'); ?>
						<!-- footer contact -->
						<h3>CONTACT US TODAY</h3>
						<address>
							<p>Contact the office at:</p>
							<p>604 703 8189</p>
							<p>7464 Panorama Dr.<br>
							Chilliwack, B.C.<br>
							V4Z 1J7</p>
							<p><a href="mailto:info@riseconsultinginc.ca">info@riseconsultinginc.ca</a></p>
							Mon - Fri: 8am - 5pm<br>
							Sat: on-call only<br>
							Sunday: closed</p>
						</address>
						<h3>FOLLOW US ON</h3>
						<div class="contactInfo">
							<!-- social media widget area -->
							<?php dynamic_sidebar('first-footer-widget-area'); ?>
						</div>
					</div>
				</div>
				<p class="copyright">&#9400; Copyright <?php echo date("Y"); ?> Rise Consulting Services Inc.</p>
			</footer>
			<script>
				$(document).ready(function(){

					/* 
					when a read more button in the Service Details Section is clicked, 
					grab its ID, hide all modals, 
					then unhide the modal with the matching id
					*/

					$('.serviceDetails button').on('click', function(){
						var id = $(this).attr('id');
						$('article').attr('class', 'hide');
						$('article#' + id).removeClass('hide');
					})

					/* 
					when a list item/grey button in the middle section is clicked, 
					grab its ID, hide all modals, 
					then unhide the modal with the matching id
					*/

					$('.servicesList li').on('click', function(){
						var id = $(this).attr('id');
						$('article').attr('class', 'hide');
							$('article#' + id).removeClass('hide');
					})

					/* 
					when the close button in the top right corner of the modal is clicked,
					hide all modals
					*/

					$('article img').on('click', function(){
						$('article').attr('class', 'hide');
					})

				});
			</script>
		<?php wp_footer(); ?>
		</div>
	</body>
</html>