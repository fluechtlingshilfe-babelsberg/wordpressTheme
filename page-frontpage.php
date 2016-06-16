<?php get_header(); ?>
<?php
	$assetsDir = get_stylesheet_directory_uri();
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
			<img src="<?= $assetsDir ?>/images/heart316.svg" width="100px" style="opacity:0.8; margin-bottom: 24px;">
			<?php the_field('flueba_aside_text'); ?>
					
			<!--<p>Ob Deutschunterricht, Begleitung zu Behörden und Ärzten, gemeinsame Unternehmungen (z. B. Führungen durch Babelsberg) – Sie können sich auf unterschiedliche Weise einbringen. Hierzu werden wir Arbeitsgruppen bilden: Sprache – Integration – Begleitung – Ausbildung/Arbeit – Veranstaltungen – Kommunikation/Organisation.</p>-->
			<center>
				<a href="<?php echo get_page_link(31) ?>" class="help-button">Helfen Sie mit!</a>
			</center>
		</div>

		<div class="col-md-5 col-md-offset-1">
			<div class="annoucement-box">
				<?php echo html_entity_decode(get_option('flueba_news')); ?>
				<?php
					$the_query = new WP_Query(array(
						'numberposts' => -1,
						'post_type' => 'termin',
						'meta_key' => 'date',
						'orderby' => 'meta_value',
						'order' => 'ASC',
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

				$count = 0;
				while ($the_query->have_posts()) {
					$count++;
					$the_query->the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<?php the_field('subscript'); ?><br>
					<a href="<?php the_permalink(); ?>">Mehr ....</a>
				<?php
				}
				wp_reset_query();
				?>
				<?php
				if($count == 0){
					echo "<p>Im Moment leider keine aktuellen Termine!<br>";
					?><a href="<?php echo get_page_link(238);?>">Zum Archiv ...</a></p><?php
				}
				else{
				?>
				<br><br>
				<a href="<?php echo get_page_link(134);?>">Alle Termine ...</a>
				<?php } ?>
			</div>

			<h3 class="text-left">Hilfe benötigt!</h3>
			<ul class="text-left">
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
	</div>

<?php } ?>
</div>

<div class="container-fluid annoucement-box intro-section">
	<div class="container">
		<p>Das Netzwerk Flüchtlingshilfe Babelsberg wird getragen von einem anerkannt gemeinnützigen Verein, der Flüchtlingshilfe Babelsberg e.V. mit Sitz in Potsdam, der derzeit ca. 70 Vereinsmitglieder hat (<a href="https://fluechtlingshilfe-babelsberg.de/vereinsmitglied-werden/">fluechtlingshilfe-babelsberg.de/vereinsmitglied-werden/</a>). Die Leitidee des Netzwerks Flüchtlingshilfe Babelsberg ist: sozial und engagiert, menschlich, nah und nachbarschaftlich, direkt und unkompliziert, gemeinnützig und unabhängig. Wir wollen gesellschaftliche Teilhabe ermöglichen und den Austausch und gesellschaftlichen Zusammenhalt in der Potsdamer Bevölkerung stärken.</p>
		<p>Derzeit arbeiten wir zum einen intensiv daran, Strukturen zu schaffen, um Flüchtlinge beim Eintritt in den Arbeitsmarkt zu unterstützen. Denn sobald die Flüchtlinge ausreichend Deutsch können, ist dies der nächste wichtige Schritt zur Integration. Zum anderen bereitet die Flüchtlingshilfe Babelsberg sich darauf vor, weitere Flüchtlinge zu begleiten, denn in den kommenden Wochen werden zusätzlich 60 Flüchtlinge, v.a. Familien mit Frauen und Kindern in Potsdam-Babelsberg untergebracht.</p>

	<div class="text-center">
		<div class="circle-image" style="background-image: url(<?= $assetsDir ?>/images/frontpage/circle01.jpg)"></div>
		<div class="circle-image" style="background-image: url(<?= $assetsDir ?>/images/frontpage/circle02.jpg)"></div>
		<div class="circle-image" style="background-image: url(<?= $assetsDir ?>/images/frontpage/circle03.jpg)"></div>
		<div class="circle-image" style="background-image: url(<?= $assetsDir ?>/images/frontpage/circle04.jpg)"></div>
	</div>

	<p>Auf Sie warten also tolle Projekte und wir warten auf Ihre tollen Ideen. Es werden jetzt viele Hände und Köpfe gebraucht, denn Potsdam integriert!</p>
	</div>
</div>

<div class="container intro-section">
	<p>Die Helfer*Innen des Netzwerks Flüchtlingshilfe Babelsberg sind in insgesamt 12 Arbeitsgruppen zu besonderen Themengebieten (<a href="https://fluechtlingshilfe-babelsberg.de/arbeitsgruppen/">fluechtlingshilfe-babelsberg.de/arbeitsgruppen/</a>). Die Arbeitsgruppen arbeiten spezialisiert, professionell und selbständig und jede*r Interessierte kann sich über die Webseite der Flüchtlingshilfe zum Mitmachen melden (<a href="https://fluechtlingshilfe-babelsberg.de/help/">fluechtlingshilfe-babelsberg.de/help/</a>). Das Netzwerk Flüchtlingshilfe Babelsberg ist ein niedrigschwelliges und kostenloses Angebot für alle Einwohner*Innen und Geflüchtete in der Landeshauptstadt Potsdam.</p>

	<div class="ag-icons">
		<div><img src="<?= $assetsDir ?>/images/icons/sprache.svg"><span>AG Sprache</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/blah.svg"><span>AG Unterkunft, Sachspenden</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/fahrrad.svg"><span>AG Fahrradwerkstatt</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/blah.svg"><span>AG Begleitung</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/law.svg"><span>AG Recht</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/freizeit.svg"><span>AG Sport &amp; Freizeit</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/events.svg"><span>AG Veranstaltungen</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/berufseinstieg.svg"><span>AG Arbeit &amp; Praktikum</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/blah.svg"><span>AG Schülerhilfe</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/it.svg"><span>AG Internet und IT</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/fundrising.svg"><span>AG Fundraising, Organisation</span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/frauenUndKinder.svg"><span>AG Frauen &amp; Kinder</span></div>
	</div>
</div>

<div class="container-fluid annoucement-box intro-section">
	<div class="container">
		<p>Bei seinen Aktionen kooperiert unser Netzwerk eng mit anderen Potsdamer Institutionen, z.B. mit dem Hasso-Plattner-Institut, der Universität Potsdam, dem Projekthaus Babelsberg, mit dem Lindenpark, Kirchgemeinden oder Potsdamer Schulen, wie z.B. mit der Katholischen Marienschule. Enge Kooperationen bestehen mit den Trägern der Gemeinschaftsunterkünfte in Potsdam, insbesondere mit der AWO Potsdam.</p>
		<p>Unser Angebot und unser Charakter ist:</p>
		<ul>
			<li>universell, d.h. unser kostenloses Angebot richtet sich an alle Geflüchtete und Migranten*Innen in Potsdam,</li>
			<li>integrationsspezifisch, d.h. das kostenlose Angebot beinhaltet v.a. Maßnahmen, die die Integration von Geflüchteten in die Gesellschaft unterstützen,</li>
			<li>dienstleistend, d.h. Geflüchtete werden durch unbürokratische Informationsweitergabe und Beratung entlastet,</li>
			<li>niederschwellig, d.h. durch wohnortnahes Agieren unseres Netzwerks und aufsuchende Arbeit unser ehrenamtlichen Helfer*Innen werden die Geflüchteten unterstützt,</li>
			<li>deutschsprachlich und bildend, d.h. Geflüchtete werden durch spezifische Bildungsangebote, derzeit v.a. zum Spracherwerb in ihrer Deutschkompetenz gestärkt; Angebote sind auf spezifische Bedarfe ausgerichtet,</li>
			<li>professionell, d.h. unsere spezifischen Angebote werden von in der jeweiligen Profession tätigen Ehrenamtler*Innen gesteuert und erbracht (z.B. Deutsch-Lehrer, Wiss. Mitarbeiter der Universität Potsdam, Rechtsanwälte),</li>
			<li>vernetzend, d.h. systematische, themenübergreifende Kooperationen und Vereinbarungen mit anderen haupt- oder ehrenamtlichen Akteuren der Flüchtlingshilfe in Potsdam,</li>
			<li>teilhabend, d.h. unsere Angebote sind Hilfe zur Selbsthilfe i.S.v. Empowerment der Geflüchteten,</li>
			<li>selbstlernend, d.h. die Angebote unseres Netzwerks werden durch ständige Evaluation in den Arbeitsgruppen und Wissenstransfer zwischen den Arbeitsgruppen durch gemeinsame Moderatorentreffen fortlaufend überprüft und an den Bedürfnissen der Zielgruppe angepasst.</li>
		</ul>
	</div>
</div>

<div class="container intro-section">
	<p>Bisherige Projekte unseres Netzwerks sind u.a. (<a href="https://fluechtlingshilfe-babelsberg.de/news/">fluechtlingshilfe-babelsberg.de/news/</a>):</p>
	<li>rund 1.200 Zeit-Stunden ehrenamtlicher Deutsch-Unterricht</li>
	<li>Betrieb eines nachmittäglichen Begegnungscafes (Tea and Talk) an drei Wochentagen, zusammen mit dem Lindenpark</li>
	<li>Betrieb einer Fahrradwerkstatt mit/für Geflüchtete, zusammen mit dem Projekthaus Babelsberg; Zurverfügungstellung von über 80 verkehrssicheren Fahrrädern an Geflüchtete</li>
	<li>Gründung und Betrieb einer kostenfreien Rechtsberatungsstelle für Geflüchtete und Flüchtlingsorganisationen in Brandenburg, zusammen mit der Juristischen Fakultät der Universität Potsdam, Lehrstuhl Professor Dr. Götz Schulze (sog. Law Clinic, <a href="https://fluechtlingshilfe-babelsberg.de/rechtsberatunglaw-clinic/">fluechtlingshilfe-babelsberg.de/rechtsberatunglaw-clinic/</a>),</li>
	<li>Willkommensfest für Potsdamer*Innen und Geflüchtete mit 600 Teilnehmern, zusammen mit dem Lindenpark</li>
	<li>Begleitung von Geflüchteten zu Ämtern, Behörden und diversen Freizeit–, Sport– und Kulturangeboten</li>
	<li>Vermittlung von Geflüchteten in niederschwellige Arbeitsplatzangebote</li>
	<li>Treffen von Potsdamer Schülern mit Geflüchteten anlässlich von Schulprojekttagen</li>
	<li>organisatorische Begleitung und Übergabe eines offenen Briefes von Geflüchteten zu den Vorkommnissen in der Silvesternacht von Köln an die Potsdamer Stadtverordnetenversammlung</li>
	<li>Kulturfest mit zahlreichen Potsdamern*Innen und einer Berliner Wandergruppe von 120 Geflüchteten aus Syrien</li>
	<li>Sozialtag mit Katholischer Marienschule Potsdam zur Mithilfe von Schülern in Flüchtlingsunterkünften</li>
	<li>Diskussionsabend zur europäischen Migrationspolitik mit Frau Ska Keller (MdEP), zusammen mit der Katholischen Marienschule Potsdam</li>
	<li>Weihnachtliche Cafe der Kulturen für Geflüchtete und Potsdamer*Innen mit über 200 Teilnehmern</li>
</div>

<div class="container-fluid annoucement-box intro-section">
	<div class="container">
		<p>Sie sehen, - Mitmachen bei uns lohnt sich und für jeden ist etwas dabei!</p>
		<p>Wenden Sie sich direkt an eine Arbeitsgruppe Ihrer Wahl: Die E-Mailadressen der AG-Leiter finden Sie unter <a href="https://fluechtlingshilfe-babelsberg.de/arbeitsgruppen/">fluechtlingshilfe-babelsberg.de/arbeitsgruppen/</a> oder abonnieren Sie unseren E-Mail-Newsletter unter <a href="https://fluechtlingshilfe-babelsberg.de/help/">fluechtlingshilfe-babelsberg.de/help/</a></p>
	</div>
</div>

<?php get_footer(); ?>
