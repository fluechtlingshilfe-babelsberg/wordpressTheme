<div>
<div class="uk-card uk-card-small">
 	<?php if (get_field('video_url')) : ?>
	    <div class="responsive-embed">
	      	<iframe src="<?php echo get_field('video_url') ?>" frameborder="0" allowfullscreen></iframe>
	    </div>
  	<?php elseif (has_post_thumbnail()) : ?>
	    <div class="uk-card-media-top">
			<a href="<?php echo get_permalink(); ?>">
				<div style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>)" class="fhb-thumbnail"></div>
			</a>
	 	</div>
 	<?php endif; ?>
  	<div class="uk-card-body uk-padding-remove">
  		<a href="<?php echo get_permalink(); ?>">
  			<h3 class="uk-card-title"><?php the_title(); ?></h3>
  		</a>
		<?php the_content('weiterlesen'); ?>
 	</div>
</div>
</div>
