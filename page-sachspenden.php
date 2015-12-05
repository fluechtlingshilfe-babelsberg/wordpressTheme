<?php get_header(); ?>

<div class="container">
	<h1>Hilfe benötigt!</h1>
	<p>Bei folgenden Aufgaben wird zur Zeit Hilfe benötigt. Klicken Sie auf die einzelnen Punkte, um per Kommentar Ihre Hilfe bereit zu stellen oder den momentanen Status zu erfahren.</p>
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
				<span class="text-muted small">(<?php comments_number('Keine Kommentare', 'Ein Kommentar', '% Kommentare')?>)</small>
			</a>
			<p class="text-muted small"><?php the_excerpt(); ?></p>
		</li>
	<?php
	}
	wp_reset_query();
	?>
</div>

<?php get_footer(); ?>
