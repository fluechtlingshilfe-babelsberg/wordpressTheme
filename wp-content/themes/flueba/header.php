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

    <nav class="navbar navbar-expand-md">
      <div class="container">
        <a class="navbar-brand" href="<?= esc_url(home_url('/')) ?>">
          <img src="<?= get_stylesheet_directory_uri() . '/images/fhb-logo.png' ?>" height="60" class="my-4">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">&#x2630;</span>
        </button>

        <div class="collapse navbar-collapse navbar-primary" id="navbarToggler">
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

    <nav class="navbar navbar-dark navbar-secondary navbar-expand">
      <div class="container my-3">
        <?php wp_nav_menu(array(
          'menu' => 'Secondary',
          'depth' => 2,
          'container' => false,
          'menu_class' => 'navbar-nav ml-sm-auto',
          'walker' => new BootstrapNavWalker()
        )); ?>
        <form class="form-inline ml-2">
          <button class="btn btn-light">Spenden</button>
        </form>
      </div>
    </nav>
