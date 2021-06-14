<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/common/hero"); ?>
<div class="posts">
	<?php while(have_posts()){
	    the_post();
     ?>
	<div class="post">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<p>
						<strong><?php the_author(); ?></strong><br/>
						<?php echo get_the_date(); ?>
					</p>
					<?php the_tags("<ul class=\"list-unstyled\"><li>","</li></li>","</li></ul>"); ?>
				</div>
				<div class="col-md-8">
					<?php the_post_thumbnail("large",["class" => "img-fluid"]);
					    the_excerpt();
					?>
				</div>
			</div>

		</div>
	</div>
	<?php }; ?>
</div>
<div class="container mb-4">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <?php the_posts_pagination(array(
                "screen_reader_text" => " "
            )); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>