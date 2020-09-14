<?php
/**
 * 	Template Name: Sidebar/Home Page
 *
 *	This page template has a sidebar built into it,
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); ?>
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article>
                <?php if (!is_front_page()) : ?>
                    <h1> <?php the_title(); ?> </h1>
                <?php endif; ?>

                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
            </article>

        <?php endwhile; ?>

    <?php else : ?>
        <article class="post error">
                <h1 class="404">Nothing has been posted like that yet</h1>
        </article>
    <?php endif; ?>

    <div id="sidebar" role="sidebar">
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>
