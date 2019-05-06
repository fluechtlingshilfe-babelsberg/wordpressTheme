<section class="uk-container uk-padding fhb-contact">
	<div class="uk-child-width-expand@m" uk-grid>
		<?php while (have_rows('contact') ): the_row(); ?>
			<?php $photo = get_sub_field('photo'); ?>
			<div>
				<div class="uk-comment fhb-profile">
					<header class="uk-comment-header uk-grid-medium uk-flex-top" uk-grid>
						<div class="uk-width-auto uk-visible@s">
							<img class="uk-visible@s uk-comment-avatar uk-border-circle" src="<?php echo $photo['sizes']['thumbnail']; ?>" width="100" height="100" alt="Photo von <?php the_sub_field('name'); ?>">
						</div>
						<div class="uk-width-expand">
							<div class="uk-comment-body">
								<img class="uk-hidden@s uk-comment-avatar uk-border-circle" src="<?php echo $photo['sizes']['thumbnail']; ?>" width="100" height="100" alt="Photo von <?php the_sub_field('name'); ?>">
								<span class="name"><?php the_sub_field('name'); ?></span>
								<span class="details"><?php the_sub_field('details'); ?></span>
								<?php if (get_sub_field('phone')): ?>
									<span class="phone"> <span uk-icon="icon: receiver"></span> <?php the_sub_field('phone'); ?></span>
								<?php endif; ?>
								<?php if (get_sub_field('email')): ?>
									<span class="email"><span uk-icon="icon: mail"></span> <a href="<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></span>
								<?php endif; ?>
							</div>
						</div>
					</header>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</section>
