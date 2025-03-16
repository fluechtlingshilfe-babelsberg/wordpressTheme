<section class="uk-container">
<div>
<?php $in_archive = intval(get_query_var('paged') ?? 1) > 1;
if (!$in_archive) { ?>
  <h2>Aktuelle Projekte</h2>
  <div class="uk-child-width-1-3@m" uk-grid>
	<?php foreach(get_posts(array("category" => 17, "posts_per_page" => -1, "post_status" => "publish")) as $post): setup_postdata($post); ?>
		<div>
			<?php get_template_part('templates/activity'); ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endforeach; ?>
  </div>

  <hr>
<?php } else { ?>
<?php echo _wp_link_page(1) ?>Zurück zu den aktuellen Projekten</a>
<?php } ?>

  <h2 id="archiv">Archiv</h2>
  <div class="uk-child-width-1-3@m" uk-grid>
	<?php
$query = new WP_Query(array("orderby" => "date", "order" => "DESC", "posts_per_page" => 12, "post_type" => "post", "category__not_in" => array(17), "post_status" => "publish", "paged" => get_query_var('paged')));
while($query->have_posts()): $query->the_post(); ?>
		<div>
			<?php get_template_part('templates/activity'); ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endwhile; ?>
</div>
<div class="pagination">
    <?php
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );
    ?>
</div>
</section>


