<?php
/**
 * The template for displaying archive pages.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<main class="site-main" role="main">

	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="entry-title">', '</h1>' );
			the_archive_description( '<p class="archive-description">', '</p>' );
			?>
		</header>
	<?php endif; ?>
	<div class="page-content">
		<?php
		while ( have_posts() ) {
			the_post();
			$post_link = get_permalink();
			?>
			<article class="post">
				<?php
				printf( '<h2 class="%s"><a href="%s">%s</a></h2>', 'entry-title', esc_url( $post_link ), wp_kses_post( get_the_title() ) );
				printf( '<a href="%s">%s</a>', esc_url( $post_link ), get_the_post_thumbnail( $post, 'large' ) );
				the_excerpt();
				?>
			</article>
		<?php } ?>
	</div>

	<?php wp_link_pages(); ?>

	<?php
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) :
		?>
		<nav class="pagination" role="navigation">
			<?php /* Translators: HTML arrow */ ?>
			<div class="nav-previous"><?php next_posts_link( sprintf( __( '%s older', 'hello-elementor' ), '<span class="meta-nav">&larr;</span>' ) ); ?></div>
			<?php /* Translators: HTML arrow */ ?>
			<div class="nav-next"><?php previous_posts_link( sprintf( __( 'newer %s', 'hello-elementor' ), '<span class="meta-nav">&rarr;</span>' ) ); ?></div>
		</nav>
	<?php endif; ?>
</main>
