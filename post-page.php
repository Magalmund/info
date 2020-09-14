<?php
/*
Template Name: post-page
*/
?>

<?php get_header(); ?>
<main>
<?php
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3)); ?>

<?php if ( $wpb_all_query->have_posts() ) : ?>

<div id="news" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
            <h3><?php the_time('m.d.Y'); ?></h3>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php endwhile; ?>
        </div>
    </div>
</div>
    <?php kama_pagenavi(); ?>
    <?php wp_pagenavi(); ?>

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Извините, нет записей, соответствуюших Вашему запросу.' ); ?></p>
<?php endif; ?>
</main>

<?php get_footer(); ?>

