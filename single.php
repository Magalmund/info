<?php get_header(); ?>
<main>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    
            <div id="post-banner" class="container-fluid">
                <div class="col-xl-8">
                    <div class="banner-title">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <div id="post" class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <?php the_content(); ?>
                        <span><?php the_time('j F Y'); ?></span>
                    </div>
                </div>
            </div>


    <?php endwhile; ?>

<?php else : ?>
    <article class="post error">
            <h1 class="404">Nothing has been posted like that yet</h1>
    </article>
<?php endif; ?>
</main>
<?php get_footer(); ?>
