<?php get_header(); ?>

<div class="container">
	<br>
	<a href="<?php echo get_page_link(330) ?>">« Zurück zu allen Pressemittelungen</a>
<?php while (have_posts()) {
	the_post();?>
	<br>
	<em class="pull-right text-muted"><small><?php the_date(); ?></small></em>
	<h1><?php the_title(); ?></h1>
	<?php the_content();
} ?>
</div>

<?php get_footer(); ?>
