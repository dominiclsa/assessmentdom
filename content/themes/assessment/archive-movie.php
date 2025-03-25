<?php get_header(); ?>

<main class="site-main">
    <h1>🎬 All Movies</h1>

    <div class="movie-grid">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="movie-card">
                <a href="<?php the_permalink(); ?>">
                    <!-- Random movie-style image based on post ID -->
                    <img src="https://picsum.photos/seed/<?php echo get_the_ID(); ?>/400/250" alt="<?php the_title_attribute(); ?>" />
                    <h2><?php the_title(); ?></h2>
                </a>
                <p><?php the_excerpt(); ?></p>
                <p><strong>Genre:</strong> <?php the_terms( get_the_ID(), 'genre' ); ?></p>
            </div>
        <?php endwhile; else : ?>
            <p>No movies found.</p>
        <?php endif; ?>
    </div>

    <div class="pagination">
        <?php echo paginate_links(); ?>
    </div>
</main>

<?php get_footer(); ?>
