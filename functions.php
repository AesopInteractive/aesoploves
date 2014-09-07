<?php

class aesopLoves{

	function __construct(){

			// Set some constants
		define('AESOPLOVES_VERSION', '0.1');

		define('AESOPLOVES_DIR', get_stylesheet_directory());
		define('AESOPLOVES_URL', get_stylesheet_directory_uri());

		add_action('wp_enqueue_scripts', 			array($this,'style'));
		add_action('novella_header_inside_top', array($this,'logo'));

		add_filter('novella_read_more', 			array($this,'novella_read_more'));

		add_filter('novella_chapter_label_text', array($this,'chapter_label'));
	}

	//enqueue style
	function style(){

		wp_enqueue_style('aesoploves-style', AESOPLOVES_URL.'/assets/css/style.css', AESOPLOVES_VERSION, true);
	}

	// add logo to header
	function logo(){
		?>
			<a class="aesoploves-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo AESOPLOVES_URL.'/assets/img/aesoploves-logo.png';?>" alt="aesoploves">
			</a>
		<?php
	}

	// remove readmore text
	function novella_read_more(){
		return '';
	}

	function chapter_label(){
		return 'Sections';
	}

}
new aesopLoves;