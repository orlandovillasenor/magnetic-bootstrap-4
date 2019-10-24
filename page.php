<section class="container-fluid">
		
	<?php get_template_part('partials/page', 'header'); ?>

	<div class="content">
		
		<?php while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>
	
	</div>
		
</section>