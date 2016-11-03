<?php get_header() ?>

<div class="container">

  <h1><?php the_title() ?></h1>
  <?php the_content() ?>

  <h1>Ansprechpartner</h1>

  <?php
$posts = get_posts(array(
  'post_type' => 'contact',
  'posts_per_page' => -1
));
$i = 0;
foreach ($posts as $post) {
  $thumb = '<div class="col-sm-3">'.get_the_post_thumbnail($post, 'large', array('class' => 'circle-image')).'</div>';
?>
  <div class="contact-card row">
	<?php if ($i % 2 == 0) echo $thumb; ?>
	<div class="col-sm-4">
	  <h3>Wer bin ich?</h3>
	  <?= get_the_title($post) ?> - <?php the_field('function', $post) ?><br>
	  <?php the_field('address', $post) ?>
	</div>
	<div class="col-sm-5">
	  <h3>Ich bin Ansprechpartner für ...</h3>
	  <?php the_field('tasks', $post) ?>
	  <div class="text-right">
	    <a class="contact-more" href="<?php the_permalink() ?>">Mehr über mich ...</a>
	  </div>
	</div>
	<?php if ($i % 2 == 1) echo $thumb; ?>
  </div>
<?php $i++;
} ?>

</div>

<?php get_footer() ?>
