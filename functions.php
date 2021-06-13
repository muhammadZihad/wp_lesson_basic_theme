<?php
	function hard_bootstrapping()   {
		load_theme_textdomain("hard");
		add_theme_support( "post_thumbnail");
		add_theme_support( "title-tag");
		register_nav_menu("topmenu", __("Top Menu", "hard"));
	}
	do_action("after_setup_theme", "hard_bootstrapping");


	add_action('init ', 'hard_setup');
	function hard_assets()  {
		wp_enqueue_style("hard", get_stylesheet_uri());
		wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
	}
	add_action("wp_enqueue_scripts", "hard_assets");


	function hard_sidebar(){
		register_sidebar(
			array(
				"name" => __("Single Post Sidebar", "hard"),
				"id" => "sidebar-1",
				"description" => __("Right sidebar for single post page", "hard"),
				"before_widget" => "<section id='%1$s' class='widget %2$s'>",
				"after_widget" => "</section>",
				"before_title" => "<h2 class='widget-title'>",
				"after_title" => "</h2>"
			));

		register_sidebar(
			array(
				"name" => __("Footer Left", "hard"),
				"id" => "footer-left",
				"description" => __("Footer widget left", "hard"),
				"before_widget" => "<section id='%1$s' class='widget %2$s'>",
				"after_widget" => "</section>",
				"before_title" => "<h2 class='widget-title'>",
				"after_title" => "</h2>"
			));

		register_sidebar(
			array(
				"name" => __("Footer Right", "hard"),
				"id" => "footer-right",
				"description" => __("Footer widget right", "hard"),
				"before_widget" => "<section id='%1$s' class='widget %2$s'>",
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