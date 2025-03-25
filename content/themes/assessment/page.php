<?php get_header(); ?>

<main class="site-main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="single-page">
            <h1><?php the_title(); ?></h1>
            <p class="meta">By <?php the_author(); ?></p>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
