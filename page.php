<?php get_header(); ?>
<main>

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>


<div class="container-fluid">
    <div class="row">
        <div id="news" class="col-xl-8">
            <div class="news-frame">
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
            <div class="news-frame">
                <div class="frame row">
                <div class="col-xl-8">
                    <div id="logo">
                        <div class="frame">
                            <a class="padding-logo">
                                <span id="image-logo" class="image">
                                </span>
                            </a>
                        </div>
                    </div>
                    <div id="timedate">
                        <div class="frame">
                        </div>
                    </div>
                    <div id="weather">
                        <div class="frame">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div id="lessons">
                        <div class="frame">
                            <h3>Koolitundid</h3>
                            <div class="row">
                                <div class="col-xl-6">
                                    <ul>
                                        <li><span>Урок 1</span><span>8.00-9.00</span></li>
                                        <li><span>Урок 1</span><span>9.00-10.00</span></li>
                                        <li><span>Урок 1</span><span>10.00-11.00</span></li>
                                        <li><span>Урок 1</span><span>10.00-11.00</span></li>
                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    <ul>
                                        <li><span>Урок 1</span><span>10.00-11.00</span></li>
                                        <li><span>Урок 1</span><span>10.00-11.00</span></li>
                                        <li><span>Урок 1</span><span>10.00-11.00</span></li>
                                        <li><span>Урок 1</span><span>10.00-11.00</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div id="changes" class="col-xl-4">
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
</div>
</main>
<?php get_footer(); ?>