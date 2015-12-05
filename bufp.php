<?php get_header(); ?>

<div class="container-fluid img">
	<div class="intro-container row">
		<h1 class="welcome">Willkommen bei der<br>Flüchtlingshilfe Babelsberg!</h1>
		<div class="intro-text">
			<h3>Über 100 Freiwillige beim Starttreffen - Arbeitsgruppen gebildet</h3>
			<p>Am 12.11.2015 haben sich über 100 freiwillige Helfer aus Babelsberg in der Aula der Katholischen Marienschule getroffen und die <a href="/index.php/arbeitsgruppen/">Arbeitsgruppen</a> der Flüchtlingshilfe Babelsberg mit Leben gefüllt. Vielen Dank für diesen großartigen Abend! (<a href="wp-content/uploads/2015/11/Bericht_FluechtlingshilfeBabelsberg_121115.pdf">Link: Protokoll des Treffens vom 12.11.2015</a>)</p>

			<p>Die Arbeitsgruppen (<a href="/index.php/arbeitsgruppen/">Link</a>) der Flüchtlingshilfe Babelsberg arbeiten selbständig, - melden Sie sich noch heute zum Mitmachen (<a href="index.php/help/">Link</a>). Auf Sie warten tolle Projekte und wir warten auf Ihre tollen Ideen. Es werden jetzt viele Hände und Köpfe gebraucht, denn Babelsberg integriert!</p>

			<p>Mitte/Ende November werden zahlreiche Flüchtlinge dauerhaft in Babelsberg untergebracht. Bereits am 30.09.2015 haben sich daher eine Reihe von Babelsberger Akteuren auf Einladung von Eltern, Schülern und Leitung der Katholischen Marienschule Potsdam getroffen, um sich zu einem lokalen Netzwerk zusammenzuschließen. <!-- Teilnehmerliste --></p>
			<p>Dies geschieht in enger Abstimmung mit der Stadt Potsdam und dem jeweiligen Träger der Flüchtlingsunterkunft in Babelsberg. Ziel ist, die in Babelsberg untergebrachten Flüchtlinge bei der Integration nachbarschaftlich zu unterstützen. Hierzu möchten wir alle Babelsberger einladen.</p>
		</div>
  </div>
</div>

<div class="container">
	<div class="row">
	</div>

	<div class="row main-items">
		<div class="col-md-offset-1 col-md-5 helpMain">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heart316.svg" width="100px" style="opacity:0.8; margin-bottom: 24px;">
			<p>Ob Deutschunterricht, Begleitung zu Behörden und Ärzten, gemeinsame Unternehmungen (z. B. Führungen durch Babelsberg) – Sie können sich auf unterschiedliche Weise einbringen. Hierzu werden wir Arbeitsgruppen bilden: Sprache – Integration – Begleitung – Ausbildung/Arbeit – Veranstaltungen – Kommunikation/Organisation.</p>
			<center>
				<a href="?page=help" class="help-button">Helfen Sie mit!</a>
			</center>
		</div>
		<div class="col-md-5 col-md-offset-1 annoucement-box">
			<?php echo get_option('flueba_news'); ?>
		</div>
  </div>

	<div class="indev">
		<h3>Unser Netzwerk ist im Aufbau, unsere Webseite auch. Bitte schauen Sie in den kommenden Tagen immer wieder vorbei, um zu sehen, was es Neues gibt.</h3>
	</div>

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
				<span class="text-muted small">(<?php comments_number('Keine Kommentare', 'Ein Kommentar', '% Kommentare')?>)</small>
			</a>
		</li>
	<?php
	}
	wp_reset_query();
	?>
	</ul>
</div>

<?php get_footer(); ?>
