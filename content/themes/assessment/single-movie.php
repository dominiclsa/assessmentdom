<?php get_header(); ?>

<main class="site-main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="movie-single">
            <h1><?php the_title(); ?></h1>
            
            <!-- Random movie-style image -->
            <img src="https://picsum.photos/seed/<?php echo get_the_ID(); ?>/800/450" alt="<?php the_title_attribute(); ?>" />
            
            <div><?php the_content(); ?></div>

            <p><strong>Genre:</strong> <?php the_terms( get_the_ID(), 'genre' ); ?></p>
        </article>

        <hr>

        <section class="related-movies">
    <h3>🎥 Related Movies</h3>
    <div class="related-movie-grid">
        <?php
        $related = new WP_Query([
            'post_type' => 'movie',
            'posts_per_page' => 3,
            'post__not_in' => [get_the_ID()],
        ]);
        while ( $related->have_posts() ) : $related->the_post(); ?>
            <div class="related-movie-card">
                <a href="<?php the_permalink(); ?>">
                    <img src="https://picsum.photos/seed/<?php echo get_the_ID(); ?>-rel/160/100" alt="<?php the_title_attribute(); ?>" />
                    <p><?php the_title(); ?></p>
                </a>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>


    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
