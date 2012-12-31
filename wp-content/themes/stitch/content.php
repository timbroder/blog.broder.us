<?php
/**
 * @package Stitch
 * @since Stitch 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="' . get_permalink() . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'stitch' ), the_title_attribute( 'echo=0' ) ) ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<?php edit_post_link( __( 'Edit', 'stitch' ), '<span class="edit-link">', '</span>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'stitch' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'stitch' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php stitch_posted_on(); ?>
			<span class="sep"></span>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'stitch' ) );
				if ( $categories_list && stitch_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'stitch' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'stitch' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"></span>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'stitch' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"></span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'stitch' ), __( '1 Comment', 'stitch' ), __( '% Comments', 'stitch' ) ); ?></span>
		<?php endif; ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->