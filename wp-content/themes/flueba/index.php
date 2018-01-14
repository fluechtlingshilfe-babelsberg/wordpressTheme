<?php get_header(); ?>

<div class="container mt-4">
<div class="row">
<div class="col-md-8 col-md-push-2 col-xs-12">
<?php while (have_posts()) {
	the_post(); ?>
	<h3><?php the_title(); ?></h3>
	<?php the_content(); ?>
	
<?php } ?>
	<hr>
	<?php comments_template(); ?>
</div>
</div>
</div>

<?php get_footer(); ?>
