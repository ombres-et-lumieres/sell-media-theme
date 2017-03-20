<?php
function top_archive()
{
	?>	<section id="primary"     <?php //post_class('apropos'); ?>    role="main"     class="content-area"  >

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

}
add_action("sell_media_above_archive_content", "top_archive");




function below_archive()
{
	?>
		</main><!-- #main -->
	</section><!-- #primary -->
	<?php
}
add_action("sell_media_below_archive_content", "below_archive");
?>
