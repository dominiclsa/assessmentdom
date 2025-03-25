<?php
/**
 * Header template.
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="header-nav" style="padding: 10px; background: #eee;">
    <a href="<?php echo esc_url( get_post_type_archive_link( 'movie' ) ); ?>" style="padding: 10px 20px; background: #2c3e50; color: white; text-decoration: none; border-radius: 4px;">
        🎬 View All Movies
    </a>
</div>
<div id="page" class="site">
	<div id="content" class="site-content">
		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
