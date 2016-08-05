<?php get_header(); ?>
<?php
	while (have_posts()) {
					the_post();

$assetsDir = get_stylesheet_directory_uri();
?>

<div class="container-fluid img">
	<div class="intro-container row">
	<h1 class="welcome"><?= __('Willkommen bei der<br>Flüchtlingshilfe Babelsberg!', 'flueba') ?></h1>
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
			<a href="<?php echo get_page_link(31) ?>" class="help-button"><?= __('Helfen Sie mit!', 'flueba') ?></a>
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
					echo "<p>". __("Im Moment leider keine aktuellen Termine!", 'flueba') ."<br>";
					?><a href="<?php echo get_page_link(238);?>"><?= __('Zum Archiv ...', 'flueba') ?></a></p><?php
				}
				else{
				?>
				<br><br>
				<a href="<?php echo get_page_link(134);?>"><?= __('Alle Termine ...', 'flueba') ?></a>
				<?php } ?>
			</div>

			<h3 class="text-left"><?= __('Hilfe benötigt!', 'flueba') ?></h3>
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
		<h2><?= __('Die Flüchtlingshilfe Babelsberg', 'flueba') ?></h2>
		<p><?= __('Das Netzwerk Flüchtlingshilfe Babelsberg wird getragen von einem anerkannt gemeinnützigen Verein, der Flüchtlingshilfe Babelsberg e.V. mit Sitz in Potsdam, der derzeit ca. 70 Vereinsmitglieder hat (<a href="https://fluechtlingshilfe-babelsberg.de/vereinsmitglied-werden/">fluechtlingshilfe-babelsberg.de/vereinsmitglied-werden/</a>). Die Leitidee des Netzwerks Flüchtlingshilfe Babelsberg ist: sozial und engagiert, menschlich, nah und nachbarschaftlich, direkt und unkompliziert, gemeinnützig und unabhängig sein. Wir wollen gesellschaftliche Teilhabe ermöglichen und den Austausch und gesellschaftlichen Zusammenhalt in der Potsdamer Bevölkerung stärken.', 'flueba') ?></p>

		<div class="text-center">
			<div class="circle-image" style="background-image: url(<?= $assetsDir ?>/images/frontpage/circle01.jpg)"></div>
			<div class="circle-image" style="background-image: url(<?= $assetsDir ?>/images/frontpage/circle02.jpg)"></div>
			<div class="circle-image" style="background-image: url(<?= $assetsDir ?>/images/frontpage/circle03.jpg)"></div>
			<div class="circle-image" style="background-image: url(<?= $assetsDir ?>/images/frontpage/circle04.jpg)"></div>
		</div>

		<p><?= __('Derzeit arbeiten wir zum einen intensiv daran, Strukturen zu schaffen, um Flüchtlinge beim Eintritt in den Arbeitsmarkt zu unterstützen. Denn sobald die Flüchtlinge ausreichend Deutsch können, ist dies der nächste wichtige Schritt zur Integration. Zum anderen bereitet die Flüchtlingshilfe Babelsberg sich darauf vor, weitere Flüchtlinge zu begleiten, denn in den kommenden Wochen werden zusätzlich 60 Flüchtlinge, vor allem Familien mit Frauen und Kindern in Potsdam-Babelsberg untergebracht.', 'flueba') ?></p>

		<p><?= __('Auf Sie warten also tolle Projekte und wir warten auf Ihre tollen Ideen. Es werden jetzt viele Hände und Köpfe gebraucht, denn Potsdam integriert!', 'flueba') ?></p>
	</div>
</div>

<div class="container intro-section">
<h2><?= __('Unsere AGs', 'flueba') ?></h2>
	<p><?= __('Die Helfer*Innen des Netzwerks Flüchtlingshilfe Babelsberg sind in insgesamt 12 Arbeitsgruppen zu besonderen Themengebieten (<a href="https://fluechtlingshilfe-babelsberg.de/arbeitsgruppen/">fluechtlingshilfe-babelsberg.de/arbeitsgruppen/</a>). Die Arbeitsgruppen arbeiten spezialisiert, professionell und selbständig und jede*r Interessierte kann sich über die Webseite der Flüchtlingshilfe zum Mitmachen melden (<a href="https://fluechtlingshilfe-babelsberg.de/help/">fluechtlingshilfe-babelsberg.de/help/</a>). Das Netzwerk Flüchtlingshilfe Babelsberg ist ein niedrigschwelliges und kostenloses Angebot für alle Einwohner*Innen und Geflüchtete in der Landeshauptstadt Potsdam.', 'flueba') ?></p>

	<div class="ag-icons">
		<div><img src="<?= $assetsDir ?>/images/icons/sprache.svg"><span><?= __('Sprache', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/sachspenden.svg"><span><?= __('Unterkunft, Sachspenden', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/fahrrad.svg"><span><?= __('Fahrradwerkstatt', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/begleitung.svg"><span><?= __('Begleitung', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/law.svg"><span><?= __('Recht', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/freizeit.svg"><span><?= __('Sport &amp; Freizeit', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/events.svg"><span><?= __('Veranstaltungen', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/berufseinstieg.svg"><span><?= __('Arbeit &amp; Praktikum', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/schueler.svg"><span><?= __('Schülerhilfe', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/it.svg"><span><?= __('Internet und IT', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/fundrising.svg"><span><?= __('Fundraising, Organisation', 'flueba') ?></span></div>
		<div><img src="<?= $assetsDir ?>/images/icons/frauenUndKinder.svg"><span><?= __('Frauen &amp; Kinder', 'flueba') ?></span></div>
	</div>
</div>

<div class="container-fluid annoucement-box intro-section">
	<h2>Projekte</h2>
	<p><?= __('Bisherige Projekte unseres Netzwerks sind unter anderem (<a href="https://fluechtlingshilfe-babelsberg.de/news/">fluechtlingshilfe-babelsberg.de/news/</a>):', 'flueba') ?></p>

	<div class="projects-wrapper">
		<button onclick="projectSlides(-1)"><span>&#x2190;</span></button>
		<button onclick="projectSlides( 1)"><span>&#x2192;</span></button>
		<div class="subtitle">
		</div>
		<div class="projects">
			<div data-text="<?= __('Betrieb eines nachmittäglichen Begegnungscafés (Tea and Talk) an drei Wochentagen, zusammen mit dem Lindenpark', 'flueba') ?>"
				style="background-image: url(<?= $assetsDir ?>/images/bilderSlider/begegnungsCafee.jpg)"></div>
			<div data-text="<?= __('Diskussionsabend zur europäischen Migrationspolitik mit Frau Ska Keller (MdEP), zusammen mit der Katholischen Marienschule Potsdam', 'flueba') ?>"
				style="background-image: url(<?= $assetsDir ?>/images/bilderSlider/diskusionsabend.jpg)"></div>
			<div data-text="<?= __('Betrieb einer Fahrradwerkstatt mit und für Geflüchtete, zusammen mit dem Projekthaus Babelsberg; Zurverfügungstellung von über 80 verkehrssicheren Fahrrädern an Geflüchtete', 'flueba') ?>"
				style="background-image: url(<?= $assetsDir ?>/images/bilderSlider/Fahrradwerkstatt1.jpg)"></div>
			<div data-text="<?= __('rund 1.200 Zeit-Stunden ehrenamtlicher Deutsch-Unterricht', 'flueba') ?>"
				style="background-image: url(<?= $assetsDir ?>/images/bilderSlider/sprachunterricht.jpg)"></div>
			<div data-text="<?= __('Willkommensfest für Potsdamer*Innen und Geflüchtete mit 600 Teilnehmern, zusammen mit dem Lindenpark', 'flueba') ?>"
				style="background-image: url(<?= $assetsDir ?>/images/bilderSlider/wilkommensfest.jpg)"></div>
		</div>
	</div>

	<ul>
		<li><?= __('Gründung und Betrieb einer kostenfreien Rechtsberatungsstelle für Geflüchtete und Flüchtlingsorganisationen in Brandenburg, zusammen mit der Juristischen Fakultät der Universität Potsdam, Lehrstuhl Professor Dr. Götz Schulze (die Law Clinic, <a href="https://fluechtlingshilfe-babelsberg.de/rechtsberatunglaw-clinic/">fluechtlingshilfe-babelsberg.de/rechtsberatunglaw-clinic/</a>),', 'flueba') ?></li>
		<li><?= __('Begleitung von Geflüchteten zu Ämtern, Behörden und diversen Freizeit–, Sport– und Kulturangeboten', 'flueba') ?></li>
		<li><?= __('Vermittlung von Geflüchteten in niederschwellige Arbeitsplatzangebote', 'flueba') ?></li>
		<li><?= __('Treffen von Potsdamer Schülern mit Geflüchteten anlässlich von Schulprojekttagen', 'flueba') ?></li>
		<li><?= __('Organisatorische Begleitung und Übergabe eines offenen Briefes von Geflüchteten zu den Vorkommnissen in der Silvesternacht von Köln an die Potsdamer Stadtverordnetenversammlung', 'flueba') ?></li>
		<li><?= __('Kulturfest mit zahlreichen Potsdamern*Innen und einer Berliner Wandergruppe von 120 Geflüchteten aus Syrien', 'flueba') ?></li>
		<li><?= __('Sozialtag mit Katholischer Marienschule Potsdam zur Mithilfe von Schülern in Flüchtlingsunterkünften', 'flueba') ?></li>
		<li><?= __('Weihnachtliches Café der Kulturen für Geflüchtete und Potsdamer*Innen mit über 200 Teilnehmern', 'flueba') ?></li>
	</ul>
</div>

<div class="container intro-section">
	<h2><?= __('Unser Angebot &amp; Charakter', 'flueba') ?></h2>
	<p><?= __('Bei seinen Aktionen kooperiert unser Netzwerk eng mit anderen Potsdamer Institutionen, z.B. mit dem Hasso-Plattner-Institut, der Universität Potsdam, dem Projekthaus Babelsberg, mit dem Lindenpark, Kirchgemeinden oder Potsdamer Schulen, wie z.B. mit der Katholischen Marienschule. Enge Kooperationen bestehen mit den Trägern der Gemeinschaftsunterkünfte in Potsdam, insbesondere mit der AWO Potsdam.', 'flueba') ?></p>
	<p><?= __('Unser Angebot und unser Charakter ist:', 'flueba') ?></p>
	<ul>
	<li><?= printf(__('%sUniversell%s: Unser kostenloses Angebot richtet sich an alle Geflüchtete und Migranten*Innen in Potsdam.', 'flueba'), '<strong>', '</strong>') ?></li>
		<li><strong>Integrationsspezifisch</strong>: Das kostenlose Angebot beinhaltet vor allem Maßnahmen, die die Integration von Geflüchteten in die Gesellschaft unterstützen.</li>
		<li><strong>Dienstleistend</strong>: Geflüchtete werden durch unbürokratische Informationsweitergabe und Beratung entlastet.</li>
		<li><strong>Niederschwellig</strong>: Durch wohnortnahes Agieren unseres Netzwerks und aufsuchende Arbeit unser ehrenamtlichen Helfer*Innen werden die Geflüchteten unterstützt.</li>
		<li><strong>Deutschsprachlich und bildend</strong>: Geflüchtete werden durch spezifische Bildungsangebote, derzeit vor allem zum Spracherwerb in ihrer Deutschkompetenz gestärkt; Angebote sind auf spezifische Bedarfe ausgerichtet.</li>
		<li><strong>Professionell</strong>: Unsere spezifischen Angebote werden von in der jeweiligen Profession tätigen Ehrenamtler*Innen gesteuert und erbracht (z.B. Deutsch-Lehrer, Wiss. Mitarbeiter der Universität Potsdam, Rechtsanwälte).</li>
		<li><strong>Vernetzend</strong>: Wir unterstützen systematische, themenübergreifende Kooperationen und Vereinbarungen mit anderen haupt- oder ehrenamtlichen Akteuren der Flüchtlingshilfe in Potsdam.</li>
		<li><strong>Teilhabend</strong>: Unsere Angebote sind Hilfe zur Selbsthilfe zum Empowerment der Geflüchteten.</li>
		<li><strong>Selbstlernend</strong>: Die Angebote unseres Netzwerks werden durch ständige Evaluation in den Arbeitsgruppen und Wissenstransfer zwischen den Arbeitsgruppen durch gemeinsame Moderatorentreffen fortlaufend überprüft und an den Bedürfnissen der Zielgruppe angepasst.</li>
		</ul>
</div>

<div class="container-fluid annoucement-box intro-section">
	<div class="container">
		<center>
			<img src="<?= $assetsDir ?>/images/heart316.svg" width="100px" style="opacity: 0.6; margin-bottom: 52px;">
		</center>
		<p><?= __('Sie sehen, Mitmachen bei uns lohnt sich und für jeden ist etwas dabei!', 'flueba') ?></p>
		<p><?= __('Wenden Sie sich direkt an eine Arbeitsgruppe Ihrer Wahl: Die E-Mailadressen der AG-Leiter finden Sie unter <a href="https://fluechtlingshilfe-babelsberg.de/arbeitsgruppen/">fluechtlingshilfe-babelsberg.de/arbeitsgruppen/</a> oder abonnieren Sie unseren E-Mail-Newsletter unter <a href="https://fluechtlingshilfe-babelsberg.de/help/">fluechtlingshilfe-babelsberg.de/help/</a>', 'flueba') ?></p>
	</div>
</div>

<script src="<?= $assetsDir ?>/js/frontpage.js"></script>

<?php get_footer(); ?>
