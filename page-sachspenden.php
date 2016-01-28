<?php get_header(); ?>

<div class="container">
	<?php
		while (have_posts()) {
			the_post();
			echo '<h1>';the_title();echo '</h1>';
			the_content();
		}
	?>
	<ul>
	<?php
		$the_query = new WP_Query(array(
			'numberposts' => -1,
			'post_type' => 'sachspende',
			'meta_key' => 'done',
			'meta_query' => array(array(
				'key'   => 'done',
				'value' => '0',
				'compare'    => '=='
			))
		));

	// TODO show notice if no spenden are to be displayed

	while ($the_query->have_posts()) {
		$the_query->the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
			<p class="text-muted small"><?php the_excerpt(); ?></p>
		</li>
	<?php
	}
	wp_reset_query();
	?>
</div>

<?php get_footer(); ?>
