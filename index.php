<?php get_header(); ?>
<main> 
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

<?php $args=array( 'category_name' => 'news','paged'=>$paged ); ?>
<?php $wp_query = new WP_Query( $args ); ?>
<div id="news-banner" class="container-fluid">
	<div class="col-xl-8">
		<div class="banner-title">
			<h1>Новости</h1>
		</div>
	</div>
</div>
<div id="news" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <?php if ( have_posts() ) : 
                 while (have_posts()) : the_post(); ?>
                <div class="news">
                    <span><?php the_time('j F Y'); ?></span>      
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                    <a class="read-continue" href="<?php the_permalink(); ?>">Читать далее</a>
                </div>
            
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php if ( function_exists( 'wp_corenavi' ) ) wp_corenavi();

endif;

wp_reset_postdata();    
?>  
</main>
<?php get_footer(); ?>