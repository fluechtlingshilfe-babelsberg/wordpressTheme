<?php get_header(); ?>

<div class="container">
	<?php
	$ags = get_terms('ag', array(
		'orderby' => 'id',
		'hide_empty' => 0
	));

	foreach ($ags as &$ag) {
		if (get_query_var('ag') == $ag->slug) {
			echo '<h1>Alle Termine der AG '.$ag->name.'</h1>';
			echo '<p>'.$ag->description.'</p>';
		}
	}

	echo '<hr class="clearfix">';

	$i = 1;
	foreach ($ags as &$ag) { ?>
		<a href="<?php echo get_term_link($ag) ?>" class="label <?php echo get_query_var('ag') == $ag->slug ? 'label-info' : 'label-default' ?>"><?php echo $ag->name ?></a>
	<?php } ?>

	<?php
		while (have_posts()) {
			the_post();
			the_termin();
		}

		next_posts_link('&laquo; Ältere Termine');
		previous_posts_link('Neuere Termine &raquo;'); 
	?>

</div>

<?php get_footer(); ?>

