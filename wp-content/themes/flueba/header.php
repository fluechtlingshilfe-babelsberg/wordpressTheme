<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="description" content="Informationen und Organisation um die Flüchtlingshilfe Babelsberg">
    <meta http-equiv="keywords" content="Potsdam Babelsberg Flüchtlinge Flüchtlingshilfe">
    <title><?php bloginfo('name') ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <?php wp_head(); ?>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="<?= get_stylesheet_directory_uri() . '/images/fhb-logo.png' ?>" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-primary" id="navbarTogglerDemo01">
<?php wp_nav_menu(array(
  'menu' => 'Primary',
  'depth' => 2,
  'container' => false,
  'menu_class' => 'navbar-nav ml-auto',
  'walker' => new BootstrapNavWalker()
)); ?>
<?php /*wp_nav_menu(array(
  'menu' => 'Language',
  'depth' => 0,
  'container' => false,
  'menu_class' => 'navbar-nav',
  'walker' => new wp_bootstrap_navwalker()
));*/ ?>
        </div>
      </div>
    </nav>

    <div class="banner-image" style="background-image: url(<?= get_stylesheet_directory_uri() . '/images/bilderSlider/diskusionsabend.jpg' ?>)">
    </div>

    <nav class="navbar navbar-dark navbar-secondary navbar-expand-lg">
      <div class="container">
        <?php wp_nav_menu(array(
          'menu' => 'Secondary',
          'depth' => 2,
          'container' => false,
          'menu_class' => 'navbar-nav ml-auto',
          'walker' => new BootstrapNavWalker()
        )); ?>
        <form class="form-inline">
          <button class="btn btn-light">Spenden</button>
        </form>
      </div>
    </nav>
