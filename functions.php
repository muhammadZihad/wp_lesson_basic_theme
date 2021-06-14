<?php
	if ( site_url() == "http://basic.local" ) {
		define( "VERSION", time() );
	} else {
		define( "VERSION", wp_get_theme()->get( "Version" ) );
	}

	function hard_bootstrapping()   {
		load_theme_textdomain("hard");
		add_theme_support( "post-thumbnails" );
		$hard_custom_header_details = array(
			"header-text" => true,
			"default-text-color" => "#222",
            "width" => 1200,
            "height" => 600,
            "flex-height" => true,
            "flex-width" => true
		);
		add_theme_support("custom-header", $hard_custom_header_details);

		$hard_custom_logo_defaults = array(
			"width" => "100",
			"height" => "100"
		);
		add_theme_support( "custom-logo", $hard_custom_logo_defaults);
		add_theme_support( "custom-background");
		add_theme_support( "title-tag" );
		register_nav_menu( "topmenu", __( "Top Menu", "hard" ) );
		register_nav_menu( "footermenu", __( "Footer Menu", "hard" ) );
	}

//	add_action( "after_setup_theme", "hard_bootstrapping" );
	add_action("after_setup_theme", "hard_bootstrapping");

	function hard_assets()  {
		wp_enqueue_style("hard", get_stylesheet_uri(), null,VERSION);
		wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
		wp_enqueue_style("featherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
		wp_enqueue_script("featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.0.1", true);
		wp_enqueue_script("hard-main-js", get_theme_file_uri("/assets/js/main.js"), array("jquery"), VERSION, true);
	}
	add_action("wp_enqueue_scripts", "hard_assets");

	function hard_sidebar(){
		register_sidebar(
			array(
				"name" => __("Single Post Sidebar", "hard"),
				"id" => "sidebar-1",
				"description" => __("Right sidebar for single post page", "hard"),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				"after_widget" => "</section>",
				"before_title" => "<h2 class='widget-title'>",
				"after_title" => "</h2>"
			));

		register_sidebar(
			array(
				"name" => __("Footer Left", "hard"),
				"id" => "footer-left",
				"description" => __("Footer widget left", "hard"),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				"after_widget" => "</section>",
				"before_title" => "<h2 class='widget-title'>",
				"after_title" => "</h2>"
			));

		register_sidebar(
			array(
				"name" => __("Footer Right", "hard"),
				"id" => "footer-right",
				"description" => __("Footer widget right", "hard"),
				"before_widget" => '<section id="%1$s" class="widget %2$s">',
				"after_widget" => "</section>",
				"before_title" => "<h2 class='widget-title'>",
				"after_title" => "</h2>"
			));
	}
	add_action( "widgets_init", "hard_sidebar");

	function hard_the_excerpt($excerpt) {
		if(post_password_required())   {
			$excerpt = get_the_password_form();
		}
		return $excerpt;
	}
	add_filter( "the_excerpt", "hard_the_excerpt");


	function hard_protected_title()   {
		return "%s";
	}
	add_filter("protected_title_format", "hard_protected_title");


	function hard_menu_item_class($classes, $item) {
		$classes[] = "list-inline-item";
		return $classes;
	}
	add_filter("nav_menu_css_class", "hard_menu_item_class", 10, 2 );


	function hard_add_banner_bg_page()  {
		if(is_page()) {
			$banner = get_the_post_thumbnail_url(null,'large');
		?>
		<style>
			.page-header{
			   background-image: url(<?php echo $banner; ?>);
			}
		</style>
	<?php
		}
		if(is_front_page()){
			if(current_theme_supports( "custom-header")){
				?>
				<style>
					.header{
						background-image: url(<?php echo header_image(); ?>);
                        margin-bottom: 50px;
					}
					.header h1.heading a, h3.tagline {
						color: #<?php echo get_header_textcolor(); ?> !important;
					}
				</style>
<?php
			}
		}
	}
	add_action( "wp_head", "hard_add_banner_bg_page", 15);