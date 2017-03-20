<?php
/**
 * Template Name: Homepage parallaxe
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


get_header();

//$sticky = get_option( 'sticky_posts' );

?>

	<section id="primary"     <?php //post_class('apropos'); ?>    role="main"     class="content-area"  >


		<main id="main" class="site-main" role="main">


			<!--première slide, affichage des données de base du site-->
			<section id="title" class="slide header site-infos">
				<!--titres du site -->
				<hgroup class="site-branding">
					<h1 class="site-title">
						<?php bloginfo( 'name' ) ; ?>
					</h1>
					<h2 class="site-description">
						<?php bloginfo( 'description' ); ?>
					</h2>
					<h3 class="site-auteur"><?php esc_html_e("by Eric Wayaffe", "ombres-et-lumieres") ?></h3>

			</hgroup>

				<!--description générale du site, source la page homepage -->
				<section class="taxonomy-description">
							<?php
				while ( have_posts() )
					{
						the_post();

						get_template_part( 'template-parts/content', 'page-home' );


					} // End of the loop. ?>
				</section>

			</section>

			<?php
				$slides_number = get_theme_mod("slides_number");

				for ( $i = 1; $i < $slides_number; $i++ )
					{

						$content = get_theme_mod('content_'.$i);

						get_template_part('sections/section', 'sell-'.$content);

						echo '<section  class="slide text-' . ($i+1) . '"><span>' . get_theme_mod("slide_".($i+1)."_text") . '</span></section>';
					}



			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<div class="clear"></div>


<?php get_footer(); ?>
