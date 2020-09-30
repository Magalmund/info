<?php get_header(); ?>
<main>

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>


<div class="container-fluid">
    <div class="row">
        <div id="news" class="col-xl-7">
            <div class="frame">
                <h1>Uudised</h1>
                <?php $catquery = new WP_Query( 'cat=3&posts_per_page=3' ); ?>
                    <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
                    <div class="post">
                        <div class="head-post">
                            <h2><?php the_title(); ?></h2>
                            <span><?php the_time('j F Y'); ?></span> 
                        </div>
                        <p><?php the_content(); ?></p>
                    </div>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
        <div id="changes" class="col-xl-5">
            <div class="frame">
                <h1>Muudatused</h1>
                <?php $catquery = new WP_Query( 'cat=2&posts_per_page=3' ); ?>
                    <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
                    <div class="post">
                        <div class="head-post">
                            <h2><?php the_title(); ?></h2>
                            <span><?php the_time('j F Y'); ?></span> 
                        </div>
                        <p><?php the_content(); ?></p>
                    </div>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
    <!--<div class="row">
        <div id="weather" class="col-xl-9">
        </div>
        <div id="time" class="col-xl-3">
        </div>
    </div>
    <div class="row">
        <div id="lessons" class="col-xl-9">
        </div>
        <div id="logo" class="col-xl-3">
        </div>
    </div>-->
</div>
</main>
<?php get_footer(); ?>