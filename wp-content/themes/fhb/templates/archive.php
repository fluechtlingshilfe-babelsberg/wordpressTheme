<?php
/*
 * Template Name: Archive
 */
function get_posts_years_array() {
    global $wpdb;
    $result = array();
    $years = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT COUNT(*), YEAR(post_date) FROM {$wpdb->posts} WHERE post_status = 'publish' GROUP BY YEAR(post_date) DESC"
        ),
        ARRAY_N
    );
    if ( is_array( $years ) && count( $years ) > 0 ) {
        foreach ( $years as $year ) {
            $result[] = ['count' => $year[0], 'year' => $year[1]];
        }
    }
    return $result;
}
get_header();
the_post();
?>
<section class="uk-container">
<div>
    <h1><?php the_title() ?></h1>
    <?php the_content() ?>
  <div class="uk-child-width-1-3@m" uk-grid>
      <div>
          <?php for ($year as $years) { ?>
          <a href="?year=<?php echo $year[1] ?>"><?php echo $year[1] ?> (<?php echo $year[0] ?> Post(s))</a>
          <?php } ?>
      </div>
	<?php
// "category__not_in" => array(17), 
$query = new WP_Query(array("orderby" => "date", "order" => "DESC", "posts_per_page" => 12, "post_type" => "post", "post_status" => "publish", "posts_per_page" => -1));
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

<?php get_footer(); ?>
