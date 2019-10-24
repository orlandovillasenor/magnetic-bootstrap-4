<section class="container-fluid">
	
	<div class="content">	
	
		<?php get_template_part('partials/page', 'header'); ?>
		
		<?php if (!have_posts()) : ?>
		
			<div class="alert alert-warning">
				
				<?php _e('Sorry, no results were found.', 'magnetic'); ?>
			
			</div>
		
		<?php get_search_form(); ?>

		<?php endif; ?>

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>

		<?php endwhile; the_posts_navigation(); ?>
	
	</div>

</section>
