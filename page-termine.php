<?php get_header(); ?>

<div class="container">
	<h1><?php the_title(); ?></h1>
	<?php
		while (have_posts()) {
			the_post();
			the_content();
		}
	?>

	<?php
	$ags = get_terms('ag', array(
		'orderby' => 'id',
		'hide_empty' => 0
	));

	$i = 1;
	foreach ($ags as &$ag) { ?>
		<a href="<?php echo get_term_link($ag) ?>" class="label label-default"><?php echo $ag->name ?></a>
	<?php } ?>

	<hr class="clearfix">

<?php
$the_query = new WP_Query(array(
	'numberposts' => -1,
	'post_type' => 'termin',
	'meta_key' => 'date',
	'orderby' => 'meta_value',
	'order' => 'ASC',
	'meta_query' => array(
		array(
			'key'     => 'date',
			'value'   => date('Ymd'),
			'compare' => '>='
		)
	)
));

while ($the_query->have_posts()) {
	$the_query->the_post();
	the_termin();
}
wp_reset_query();
?>
</div>

<?php get_footer(); ?>
