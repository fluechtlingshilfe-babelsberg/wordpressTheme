<?php get_header(); ?>

<div class="container">
	<h1><?php the_title(); ?></h1>
			
	<?php
		while (have_posts()) {
			the_post();
			the_content();
		}
	?>

	<!--<h2>Wir planen folgende Arbeitsgruppen</h2>-->

	<?php
	$ags = get_terms('ag', array(
		'orderby' => 'id',
		'hide_empty' => 0
	));

	$i = 1;
	foreach ($ags as &$ag) { ?>
		<h3><?php echo $i++ ?>. AG <?php echo $ag->name ?></h3>
		<p><?php echo $ag->description ?></p>
	<?php } ?>
	</div>

</div>

<?php get_footer(); ?>
