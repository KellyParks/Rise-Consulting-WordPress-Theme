<?php get_header(); ?>
			<section class="serviceDetails">
				<div class="container">
					<!-- get the post category name and use it as the section's title -->
					<h1 class="text-center"><?php echo get_cat_name(2); ?></h1>
					<ul>
					<!-- loop through all the posts and output their titles, excerpts, and read more links -->
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li>
							<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
							<button data-remodal-target="<?php the_ID(); ?>">READ MORE >></button>
						</li>
					<?php endwhile; ?>
					<?php endif; ?>
					</ul>
				</div>
			</section>
			<section class="servicesList">
				<div class="container">
					<ul>
					<!-- loop through all the posts and output their titles -->
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li id="<?php the_ID(); ?>"><a href="#<?php the_ID(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					<?php endif; ?>
					</ul>	
				</div>
			</section>
<?php get_footer(); ?>