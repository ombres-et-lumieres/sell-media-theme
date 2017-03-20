<?php
/**
 * template for archives
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */





get_header(); ?>

	<section id="primary"     <?php //post_class('apropos'); ?>    role="main"     class="content-area"  >

		<main id="main"  role="main">

			<section id="title" class="slide header about">
				<hgroup class="site-branding">
					<h1 class="site-title">
						<?php bloginfo( 'name' ) ; ?>
					</h1>
				</hgroup>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<section class="taxonomy-description">', '</section>' );
					?>
				</header>

			</section><!-- id="title" class="slide header about" -->



			<?php
				get_template_part('sections/section', 'sell-photos');

			?>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>
