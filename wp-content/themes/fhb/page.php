<?php get_header(); ?>

<?php while(have_rows('section')): the_row(); ?>
	<?php if(get_sub_field('content')): ?>
	<section class="uk-container <?php if (get_sub_field('color')) echo 'uk-section-primary'; ?>">
	 <h2><?php the_sub_field('title'); ?></h2>
	 <?php the_sub_field('content'); ?>
 </section>
<?php endif; ?>
 <?php if(get_field('contact')) get_template_part('templates/contact'); ?>
<?php endwhile; ?>

<?php if(get_field('project')) get_template_part('templates/activities'); ?>

<?php get_footer(); ?>
