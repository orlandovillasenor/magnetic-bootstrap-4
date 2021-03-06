<?php get_header(); ?>

<main class="main" role="document">
	
	<section class="container-fluid">

		<div class="content">

			<?php while (have_posts()) : the_post(); ?>

				<article <?php post_class(); ?>>

					<header>

						<h1 class="entry-title"><?php the_title(); ?></h1>

						<?php get_template_part('partials/entry-meta'); ?>

					</header>

					<div class="entry-content">

						<?php the_content(); ?>

					</div>

				</article>

			<?php endwhile; ?>

		</div>

	</section>

</main>

<?php get_footer(); ?>