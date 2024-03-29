<?php get_header(); ?>

<section class="uk-container">
	<?php dynamic_sidebar('offers-top-description'); ?>
</section>

<section class="offer-container uk-container uk-padding-remove-top">
	<div class="uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php if (date('Y-m-d') > get_field('date', $post->ID)) : ?>
				<?php get_template_part('templates/offer'); ?>
			<?php endif; ?>
		<?php endwhile;
		endif; ?>
	</div>
</section>
<?php get_footer(); ?>
