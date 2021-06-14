<?php
	/*
	*Template Name: Special Template
	*/
	get_header();
?>

<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/about-page/hero-page"); ?>
	<div class="container errorview">
		<div class="row my-4">
			<div class="col-md-12 text-center">
				<h1 class="text-center">
					<?php _e("Sorry ! Page not found", "hard"); ?>
				</h1>
			</div>
		</div>
	</div>
<?php get_footer(); ?>