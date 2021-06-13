<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( "hero"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post" <?php post_class(); ?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="post-title"><?php the_title(); ?></h2>
                                <p class="text-center">
                                    <strong><?php the_author(); ?></strong><br/>
						            <?php echo get_the_date(); ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
					            <?php the_post_thumbnail("large",["class" => "img-fluid"]);
						            the_content(); ?>
                            </div>
				            <?php if(comments_open()) { ?>
                                <div class="col-md-12">
						            <?php comments_template(); ?>
                                </div>
				            <?php } ?>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-12">
					            <?php the_tags("<ul class=\"list-unstyled\"><li>","</li></li>","</li></ul>"); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6"><?php previous_post_link(); ?></div>
                                    <div class="col-md-6"><?php next_post_link(); ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
	            <?php if(is_active_sidebar( "sidebar-1")){
	                dynamic_sidebar("sidebar-1");
                } ?>
            </div>
        </div>
    </div>


<?php get_footer(); ?>