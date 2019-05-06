<?php get_header(); ?>

<?php if (have_posts()): while(have_posts()): the_post(); ?>
	<section class="uk-container">
		<h2><?php the_title(); ?></h2>
		<?php if (get_field('date')): ?>
			<div class="fhb-date"><span uk-icon="icon: calendar"></span> <?php the_field('date'); ?></div>
		<?php endif; ?>
		<?php if (get_field('time')): ?>
			<div class="fhb-time"><span uk-icon="icon: clock"></span> <?php echo get_field('time') . (get_field('time_end') ? '-' . get_field('time_end') : ''); ?></div>
		<?php endif; ?>
		<?php if (get_field('location')): ?>
			<div class="fhb-location"><span uk-icon="icon: location"></span> <?php the_field('location'); ?></div>
		<?php endif; ?>
		<?php the_content(); ?>
	</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
