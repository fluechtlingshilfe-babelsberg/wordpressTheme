<?php
/*
 * Template Name: Archive
 */
$current = isset($_GET['jahr']) ? $_GET['jahr'] : '2025';

function get_posts_years_array() {
    global $wpdb;
    $result = array();
    $years = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT COUNT(*), YEAR(post_date) FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status = 'publish' GROUP BY YEAR(post_date) DESC"
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
      <div style="margin-bottom: 3rem">
	Archiv für das Jahr:
          <?php $first = true; foreach (get_posts_years_array() as $year) { ?>
<?php
if (!$first) {echo '&bullet;'; }
if ($first) { $first = false; } ?>
		  <a style="<?php echo $current == $year["year"] ? "font-weight: bold" : ""?>" href="<?php echo add_query_arg('jahr', $year['year']) ?>"><?php echo $year['year'] ?>
		<small>(<?php echo $year['count'] ?> Post<?php echo $year['count'] == 1 ? '' : 's' ?>)</small></a>
          <?php } ?>
      </div>
  <div class="uk-child-width-1-3@m" uk-grid>
	<?php
// "category__not_in" => array(17), 
$query = new WP_Query(array('date_query' => array( array( 'year' => $current,),),"orderby" => "date", "order" => "DESC", "posts_per_page" => 12, "post_type" => "post", "post_status" => "publish", "posts_per_page" => -1));
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

