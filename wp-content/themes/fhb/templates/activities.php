<section class="uk-container">
<div uk-grid>
 <div class="uk-width-1-2@s uk-width-2-3@m">
  <h2>Aktuelle Projekte</h2>
  <div class="uk-child-width-1-2@m" uk-grid>
		<?php foreach(get_field('project') as $post): setup_postdata($post); ?>
			   <div>
			    <div class="uk-card uk-card-small">
			     <div class="uk-card-media-top">
						 <a href="<?php echo get_permalink(); ?>"><div style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>)" class="fhb-thumbnail"></div></a>
			     </div>
			     <div class="uk-card-body uk-padding-remove">
			      <a href="<?php echo get_permalink(); ?>"><h3 class="uk-card-title"><?php the_title(); ?></h3></a>
            <?php the_content('weiterlesen'); ?>
			     </div>
			    </div>
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
					<div class="uk-card uk-card-small">
					 <div class="uk-card-media-top">
						 <a href="<?php echo get_permalink(); ?>"><div style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>)" class="fhb-thumbnail"></div></a>
					 </div>
					 <div class="uk-card-body uk-padding-remove">
						<a href="<?php echo get_permalink(); ?>"><h3 class="uk-card-title"><?php the_title(); ?></h3></a>
            <?php the_content('weiterlesen'); ?>
					 </div>
					</div>
				 </div>
			<?php wp_reset_postdata(); ?>
		<?php endforeach; ?>
 </div>
</div>
</section>
