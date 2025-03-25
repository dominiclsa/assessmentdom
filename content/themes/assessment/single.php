<?php get_header(); ?>

<main class="site-main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="single-post">
            <h1><?php the_title(); ?></h1>
            <p class="meta">By <?php the_author(); ?> | <?php the_date(); ?></p>
            <img src="https://picsum.photos/seed/<?php echo get_the_ID(); ?>-post/800/400" alt="<?php the_title_attribute(); ?>" />
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
