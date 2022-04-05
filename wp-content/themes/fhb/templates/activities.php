<section class="uk-container">
<div uk-grid>
 <div class="uk-width-1-2@s uk-width-2-3@m">
  <h2>Aktuelle Projekte</h2>
  <div class="uk-child-width-1-2@m" uk-grid>
		<?php foreach(get_field('project') as $post): setup_postdata($post); ?>
			<div>
			   	<?php get_template_part('templates/activity'); ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endforeach; ?>
  </div>
 </div>
 <div class="uk-width-1-2@s uk-width-1-3@m">
  <h2>Nachlese</h2>
  <div class="uk-child-width-1-1" uk-grid>
		<?php foreach(get_field('archive') as $post): setup_postdata($post); ?>
			<div>
			   	<?php get_template_part('templates/activity'); ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endforeach; ?>
 </div>
</div>
</section>
