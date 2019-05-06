<nav class="uk-navbar-container uk-preserve-color uk-section-muted" id="nav-bottom" uk-navbar>
 <div class="uk-navbar-left">
  <span class="fhb-nav-nolink">©2017 Flüchtlingshilfe Babelsberg</span>
 </div>
 <div class="uk-navbar-right">
  <ul class="uk-navbar-nav">
   <li><a href="<?php the_field('facebook_page', 'option'); ?>" aria-label="facebook"><span uk-icon="icon: facebook"></span></a></li>
   <?php $menu = wp_get_menu_array('Menu 3'); ?>
   <?php foreach($menu as $item): ?>
     <li <?php if (get_permalink() == $item['url']) echo 'class="uk-active"'; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
   <?php endforeach; ?>
  </ul>
 </div>
</nav>
