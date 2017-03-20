<section  class="slide last-photos">
<?php
if (!is_archive())
{
echo do_shortcode("[sell_media_filter]");

	}
	else
		{
			$query = $wp_query;
	//		global $wp_query;
$settings = sell_media_get_plugin_options();
?>




	<div id="sell-media-archive" class="sell-media">
		<div id="content" role="main">






			<div class="<?php echo apply_filters( 'sell_media_grid_item_container_class', 'sell-media-grid-item-container' ); ?>">

			<?php
			// check if this term has child terms, if so, show terms
			$term_id = $wp_query->get_queried_object_id();
			$children = get_term_children( $term_id, 'collection' );

			if ( $children ) :

				$taxonomy_name = 'collection';
				$i = 0;
				$args = array(
					'orderby' => 'name',
					'hide_empty' => false,
					'parent' => $term_id,
				);

				$terms = get_terms( $taxonomy_name, $args );

				// count number of child terms
				$c = 0;

				if ( ! is_wp_error( $terms ) ) {
					foreach ( $terms as $child ) {
						$c++;
						$args = array(
							'post_status' => 'publish',
							'taxonomy' => 'collection',
							'field' => 'slug',
							'term' => $child->slug,
						);
						$posts = New WP_Query( $args );
						$post_count = 0;
						$post_count = $posts->found_posts;

						if ( $post_count != 0 ) :
							$i++; ?>

							<div class="<?php echo apply_filters( 'sell_media_grid_item_class', 'sell-media-grid-item', NULL ); ?>">
								<div class="sell-media-item-wrap sell-media-collection">
									<a href="<?php echo get_term_link( $child ); ?>" class="collection">

										<div class="sell-media-item-details">
											<div class="sell-media-collection-details">
												<h3 class="collection-title"><?php echo $child->name; ?></h3>
												<span class="sell-media-collection-count"><span class="count"><?php echo $post_count; ?></span><?php _e( ' images in ', 'sell_media' ); ?><span class="collection"><?php echo $child->name; ?></span><?php _e(' collection', 'sell_media'); ?></span>
												<span class="sell-media-collection-price"><?php _e( 'Starting at', 'sell_media' ); ?> <span class="price"><?php echo sell_media_get_currency_symbol(); ?><?php echo $settings->default_price; ?></span></span>
											</div>
										</div>
										<?php
										$args = array(
											'posts_per_page' => 1,
											'taxonomy' => 'collection',
											'field' => 'slug',
											'term' => $child->slug
										);
										$posts = New WP_Query( $args );
										?>

										<?php foreach( $posts->posts as $post ) : ?>
											<?php
												$collection_attachment_id = get_term_meta( $child->term_id, 'collection_icon_id', true );
												if ( ! empty ( $collection_attachment_id ) ) {
													echo wp_get_attachment_image( $collection_attachment_id, 'sell_media_item' );
												} else {
													sell_media_item_icon( $post->ID, 'sell_media_item' );
												}
											?>
										<?php endforeach; ?>
									</a>
								</div><!-- .sell-media-item-wrap -->
							</div>
						<?php endif; ?><!-- loop over term children -->
					<?php } ?><!-- show child terms check -->
				 <?php } ?><!-- not a WP error check -->

			<?php else : ?>

				<?php if ( have_posts() ) : ?>
					<?php rewind_posts(); ?>
					<?php $i = 0; ?>
					<?php while ( have_posts() ) : the_post(); $i++; ?>
						<?php echo apply_filters( 'sell_media_content_loop', $post->ID, $i ); ?>
					<?php endwhile; ?>
				<?php else : ?>
					<h2><?php _e( 'Nothing Found', 'sell_media' ); ?></h2>
					<p><?php _e( 'Sorry, but we couldn\'t find anything that matches your search query.', 'sell_media' ); ?>
					<?php echo do_shortcode( '[sell_media_searchform]' ); ?>
				<?php endif; $i = 0; ?>

			<?php endif; ?><!-- show child terms check -->

			</div><!-- .sell-media-grid-item-container -->
			<?php
			if ( ! $children ) {
				echo sell_media_pagination_filter( $wp_query->max_num_pages );
			}
			?>
		</div><!-- #content -->
	</div><!-- #sell-media-archive .sell-media -->

<?php
		}



?>


</section>	<!-- class="slide last-photos" -->
