<header>

<div id="fhb-logo-small" class="uk-hidden@s boundary-align">
	<a href="/">
		<img src="<?php echo get_template_directory_uri()?>/img/logo.svg" alt="FHB Logo">
	</a>

<button class="uk-align-right uk-button" type="button"><span uk-icon="icon: menu; ratio: 1.5"></span></button>
	<div uk-dropdown="offset: 0; pos: bottom-justify; mode: click; boundary: .boundary-align; boundary-align: true">
			<ul class="uk-nav uk-dropdown-nav">
				<?php $menu = wp_get_menu_array('Menu 1'); ?>
				<?php foreach($menu as $item): ?>
					<li <?php if (get_permalink() == $item['url']) echo 'class="uk-active"'; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
				<?php endforeach; ?>
			</ul>
	</div>

</div>

	<nav class="uk-visible@s uk-navbar-container uk-preserve-color uk-section-default" id="nav-top" uk-navbar>
		<div class="uk-navbar-left">
			<a href="/" id="fhb-logo" class="uk-navbar-item uk-logo uk-visible@s"><img src="<?php echo get_template_directory_uri()?>/img/logo.svg" alt="FHB Logo"></a>
		</div>
		<div class="uk-navbar-right">
			<ul class="uk-navbar-nav">
				<?php $menu = wp_get_menu_array('Menu 1'); ?>
				<?php foreach($menu as $item): ?>
					<li <?php if (get_permalink() == $item['url']) echo 'class="uk-active"'; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</nav>
	<?php if (get_the_post_thumbnail_url()): ?>
		<div class="fhb-article-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>)">
			<?php if (get_post_type() == 'page'): ?>
				<div class="content"><h1><?php the_title(); ?></h1></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<nav class="uk-navbar-container uk-preserve-color uk-navbar-transparent uk-section-secondary" id="nav-sub" uk-navbar>
		<div class="uk-navbar-right">
			<ul class="uk-navbar-nav">
				<?php $menu = wp_get_menu_array('Menu 2'); ?>
				<?php foreach($menu as $item): ?>
					<li <?php if (get_permalink() == $item['url']) echo 'class="uk-active"'; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</nav>
</header>
