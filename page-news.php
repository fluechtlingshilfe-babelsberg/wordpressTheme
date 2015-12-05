<?php get_header(); ?>

<div class="container">
	<br>
<?php
$btpgid = get_queried_object_id();
$btmetanm = get_post_meta($btpgid, 'WP_Catid','true');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
	'posts_per_page' => 10,
	'category_name' => $btmetanm,
	'paged' => $paged,
	'post_type' => 'post'
);
$posts = new WP_Query($args);

while ($posts->have_posts()) {
	$posts->the_post(); ?>
	<em class="pull-right text-muted"><small><?php the_date(); ?></small></em>
	<a href="<?php the_permalink();?>"><h1><?php the_title(); ?></h1></a>
	<?php the_content(); ?>
	<hr>
<?php }
next_posts_link('&laquo; Ältere Einträge', $posts->max_num_pages);
previous_posts_link('Neuere Einträge &raquo;'); 

wp_reset_postdata(); 
?>
</div>

<?php get_footer(); ?>
