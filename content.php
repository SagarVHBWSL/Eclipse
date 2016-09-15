<?php
/**
 * Content Template
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

?>
<?php add_filter( 'post_class', 'cyberchimps_ep_custom_class' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row-fluid">
		

		<?php if (is_single()) : ?>

		<div class="span12">

			<?php elseif (is_search()): ?>

			<?php if ('post' == get_post_type()): ?>

			<div class="span12">

				<?php else: ?>

				<div class="span12">

					<?php endif; ?>

					<?php elseif (is_archive()): ?>

					<div class="span12">

						<?php elseif (is_page()): ?>

						<div class="span12">

							<?php else : // blog post pages ?>

							<div class="span12">

								<?php endif; ?>
								
								<?php
								if ( is_home() || is_archive() ) {
									cyberchimps_featured_image();
								}
								?>

								<header class="entry-header">

									<?php echo ( 'post' == get_post_type() && !is_single() || is_search() ) ? '<h2 class="entry-title">' : '<h1 class="entry-title">'; ?>

									<?php
									if( 'page' == get_post_type() ) :

										// get the page title toggle option
										$page_title = get_post_meta( get_the_ID(), 'cyberchimps_page_title_toggle', true );

										if( is_search() ): ?>

											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'eclipse' ), the_title_attribute( 'echo=0' ) ); ?>"
											   rel="bookmark">
												<?php ( get_the_title() ) ? the_title() : the_permalink(); ?>
											</a>
										<?php
										elseif( $page_title == "1" || $page_title == "" ) :
											( get_the_title() ) ? the_title() : the_permalink();
										endif;
									else :
										if( 'post' == get_post_type() && is_single() ) : ?>

											<?php // get the post title toggle option
											$post_title = get_theme_mod( 'single_post_title' );
											if( $post_title == "1" ) :
												( get_the_title() ) ? the_title() : the_permalink();
											endif;
										else : ?>
											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'eclipse' ), the_title_attribute( 'echo=0' ) ); ?>"
											   rel="bookmark"><?php ( get_the_title() ) ? the_title() : the_permalink(); ?></a>
										<?php
										endif;
									endif; ?>

									<?php echo ( 'post' == get_post_type() && !is_single() || is_search() ) ? '</h2>' : '</h1>'; ?>

								</header>
								<!-- .entry-header -->

								<?php if( get_post_type() == 'post' ): ?>
									<footer class="">
										<div class="entry-meta">
											<?php cyberchimps_post_format_icon(); ?>

											<?php if( 'post' == get_post_type() ) : ?>

												<?php cyberchimps_posted_on(); ?>

												<?php cyberchimps_posted_by(); ?>

												<?php cyberchimps_posted_in() ?>

												<?php cyberchimps_post_tags(); ?>

											<?php endif; // End if 'post' == get_post_type() ?>

											<?php cyberchimps_post_comments() ?>

											<?php edit_post_link( __( 'Edit', 'eclipse' ), '<span class="edit-link">', '</span>' ); ?>
										</div>
									</footer>
								<?php endif; ?>

								<?php if( is_single() ) : ?>

									<div class="entry-content">
										<?php cyberchimps_featured_image(); ?>
										<?php the_content( __( 'Continue reading', 'eclipse' ) . ' <span class="meta-nav">&rarr;</span>' ); ?>
										<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'eclipse' ), 'after' => '</div>' ) ); ?>
									</div><!-- .entry-content -->

								<?php elseif( is_search() ): ?>
									<?php if ( get_theme_mod( 'search_post_excerpts', 0 ) ): ?>
									<div class="entry-summary">
										<?php cyberchimps_featured_image(); ?>
										<?php add_filter( 'excerpt_more', 'cyberchimps_search_excerpt_more', 999 ); ?>
										<?php add_filter( 'excerpt_length', 'cyberchimps_search_excerpt_length', 999 ); ?>
										<?php the_excerpt(); ?>
										<?php remove_filter( 'excerpt_length', 'cyberchimps_search_excerpt_length', 999 ); ?>
										<?php remove_filter( 'excerpt_more', 'cyberchimps_search_excerpt_more', 999 ); ?>
									</div><!-- .entry-summary -->
									<?php endif; ?>

								<?php
								elseif( is_archive() ): ?>
									<?php if( get_theme_mod( 'archive_post_excerpts', 0 ) ): ?>
										<div class="entry-summary">
											
											<?php the_excerpt(); ?>
										</div>
									
									<?php endif; ?>

								<?php
								elseif( is_page() ): ?>
									<div class="entry-summary">
										<?php cyberchimps_featured_image(); ?>
										<?php the_content(); ?>
										<?php edit_post_link( __( 'Edit', 'eclipse' ), '<span class="edit-link">', '</span>' ); ?>
									</div><!-- .entry-summary -->

								<?php
								elseif( is_home() ) : // blog post pages ?>
									<?php if( get_theme_mod( 'post_excerpts', 0 ) ): ?>
										<div class="entry-summary">
											
											<?php the_excerpt(); ?>
										</div>
									
									<?php endif; ?>

								<?php else: ?>
									<div class="entry-content">
										<?php the_content(); ?>
									</div><!-- .entry-content -->
									
								<?php endif; ?>

								<!-- #entry-meta -->
							</div>
							<!-- span 9 or 12 depending on content -->
						</div>
						<!-- row fluid -->
						<div class="clear"></div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php remove_filter( 'post_class', 'cyberchimps_ep_custom_class' ); ?>
