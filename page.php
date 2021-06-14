<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/common/hero"); ?>
<div class="posts">
	<?php if(have_posts()) {
	    the_post();
	 ?>
	<div class="post">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<h2 class="post-title text-center"><?php the_title(); ?></h2>
					<p class="text-center">
						<strong><?php the_author(); ?></strong><br/>
						<?php echo get_the_date(); ?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<?php if(has_post_thumbnail()){
						the_post_thumbnail("large", ["class"=> "img-fluid"]);
					}
					the_content();
					?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php get_footer(); ?>