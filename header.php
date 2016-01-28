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
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
		<a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
		<?php /* Primary navigation */
			wp_nav_menu(array(
				'menu' => 'top_menu',
				'depth' => 2,
				'container' => false,
				'menu_class' => 'nav navbar-nav',
				'walker' => new wp_bootstrap_navwalker()
			));
		?>
      </div><!--/.nav-collapse -->
    </nav>
