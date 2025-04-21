<section class="uk-container">
<div>
  <h2>Aktuelle Projekte</h2>
  <div class="uk-child-width-1-3@m" uk-grid>
	<?php foreach(get_posts(array("category" => 17, "posts_per_page" => -1, "post_status" => "publish")) as $post): setup_postdata($post); ?>
		<div>
			<?php get_template_part('templates/activity'); ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endforeach; ?>
  </div>
</section>


