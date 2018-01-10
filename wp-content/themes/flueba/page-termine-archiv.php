<?php get_header(); ?>

<div class="container">
<?php
while (have_posts()) {
	the_post();
	echo '<h1>';the_title();echo '</h1>';
	the_content();
}

$btpgid = get_queried_object_id();
$btmetanm = get_post_meta($btpgid, 'WP_Catid','true');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
	'posts_per_page' => 10,
	'category_name' => $btmetanm,
	'paged' => $paged,
	'post_type' => 'termin',
	'meta_key' => 'date',
	'orderby' => 'meta_value',
	'meta_query' => array(
		array(
			'key'     => 'date',
			'value'   => date('Ymd'),
			'compare' => '<'
		)
	)
);
$posts = new WP_Query($args);

while ($posts->have_posts()) {
	$posts->the_post(); ?>
	<?php the_termin(false); ?>
	<hr>
<?php }
next_posts_link('&laquo; Ältere Einträge', $posts->max_num_pages);
previous_posts_link('Neuere Einträge &raquo;'); 

wp_reset_postdata(); 
?>
</div>

<?php get_footer(); ?>
