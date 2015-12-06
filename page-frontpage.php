<?php get_header(); ?>
<?php
	while (have_posts()) {
					the_post();
?>

<div class="container-fluid img">
	<div class="intro-container row">
		<h1 class="welcome">Willkommen bei der<br>Flüchtlingshilfe Babelsberg!</h1>
		<div class="intro-text">
			<?php the_content(); ?>
		</div>
  </div>
</div>

<div class="container">
	<div class="row">
	</div>

	<div class="row main-items">
		<div class="col-md-offset-1 col-md-5 helpMain">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heart316.svg" width="100px" style="opacity:0.8; margin-bottom: 24px;">
			<?php the_field('flueba_aside_text'); ?>
					
			<!--<p>Ob Deutschunterricht, Begleitung zu Behörden und Ärzten, gemeinsame Unternehmungen (z. B. Führungen durch Babelsberg) – Sie können sich auf unterschiedliche Weise einbringen. Hierzu werden wir Arbeitsgruppen bilden: Sprache – Integration – Begleitung – Ausbildung/Arbeit – Veranstaltungen – Kommunikation/Organisation.</p>-->
			<center>
				<a href="<?php echo get_page_link(31) ?>" class="help-button">Helfen Sie mit!</a>
			</center>
		</div>
		<div class="col-md-5 col-md-offset-1 annoucement-box">
			<?php echo html_entity_decode(get_option('flueba_news')); ?>
			<?php
				$the_query = new WP_Query(array(
					'numberposts' => -1,
					'post_type' => 'termin',
					'meta_query' => array(
						array(
							'key'     => 'show_on_start_page',
							'value'   => '1',
							'compare' => '=='
						),
						array(
							'key'     => 'date',
							'value'   => date('Ymd'),
							'compare' => '>='
						)
					)
				));

			while ($the_query->have_posts()) {
				$the_query->the_post(); ?>
				<h3><?php the_title(); ?></h3>
				<?php the_field('subscript'); ?><br>
				<a href="<?php the_permalink(); ?>">Mehr ....</a>
			<?php
			}
			wp_reset_query();
			?>
		</div>
  </div>

	<div class="indev">
		<h3>Unser Netzwerk ist im Aufbau, unsere Webseite auch. Bitte schauen Sie in den kommenden Tagen immer wieder vorbei, um zu sehen, was es Neues gibt.</h3>
	</div>
<?php } ?>

	<h3>Hilfe benötigt!</h3>
	<ul>
	<?php
		$the_query = new WP_Query(array(
			'numberposts' => -1,
			'post_type' => 'sachspende',
			'meta_key' => 'done',
			'meta_query' => array(array(
				'key'   => 'done',
				'value' => '0',
				'compare'    => '=='
			))
		));

	// TODO show notice if no spenden are to be displayed

	while ($the_query->have_posts()) {
		$the_query->the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</li>
	<?php
	}
	wp_reset_query();
	?>
	</ul>
</div>

<?php get_footer(); ?>
