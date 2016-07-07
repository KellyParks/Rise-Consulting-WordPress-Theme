<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?><?php if(is_front_page()){ echo ' - ' . get_bloginfo('description'); } else echo wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Rise Consulting Services Inc. offers oil and gas industry management services and specializes in project management, estimating, construction execution plans, quality control and drafting. They are based in Chilliwack, British Columbia.">
		<meta name="keywords" content="Rise Consulting Services Inc, Chilliwack, British Columbia, oil and gas, construction, project management, service, drafting, estimating, construction, quality control">
		<?php wp_head(); ?>
	</head>
	<body>
		<!-- retrieve all posts, loop through them to generate the markup for the modals -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="remodal" data-remodal-id="<?php the_ID(); ?>" role="dialog" aria-labelledby="<?php the_title(); ?>" aria-describedby="modal1Desc">
				<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
				<div>
					<h4 id="modal1Title"><?php the_title(); ?></h4>
					<p id="modal1Desc">
				    	<?php the_content(); ?>
					</p>
				</div>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="remodal-bg">
			<header>
				<div class="container">
					<!-- logo, location and tagline in header -->
					<?php the_custom_logo(); ?>
					<address>Chilliwack, BC<br>604 703 8189</address>
					<div>
						<p><?php bloginfo('description'); ?></p>
					</div>
				</div>
			</header>