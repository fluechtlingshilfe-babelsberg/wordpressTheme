<?php /* Template Name: Simple */ ?>

<?php get_header(); ?>

<?php while (have_posts()) { ?>
    <section class="uk-container uk-container-small">
        <?php the_post(); ?>
        <h1><?php the_title() ?></h1>
        <?php the_content(); ?>
    </section>
<?php } ?>

<?php get_footer(); ?>