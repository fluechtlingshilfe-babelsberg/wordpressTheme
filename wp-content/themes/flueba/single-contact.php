<?php get_header() ?>

<div class="container contact-page">
<div class="row">
  <br>

  <div class="col-sm-3 text-center contact-sidebar">
	<?php the_post_thumbnail('large', array('class' => 'circle-image')) ?>
	<h1><?php the_title() ?></h1>
	<h3>Kontaktdaten</h3>
	<div class="text-left">
	<?php the_field('address'); ?>
	</div>

	<br>

	<h3>Aufgaben</h3>
	<div class="text-left">
	<?php the_field('tasks'); ?>
	</div>
  </div>
  <div class="col-sm-9 contact-description">
	<?php the_field('description'); ?>
  </div>
</div>
</div>

<br>

<?php get_footer() ?>
