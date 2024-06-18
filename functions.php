<?php
/**
 * vetbookeeping functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vetbookeeping
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vetbookeeping_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on vetbookeeping, use a find and replace
		* to change 'vetbookeeping' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'vetbookeeping', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'vetbookeeping' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'vetbookeeping_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'vetbookeeping_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vetbookeeping_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vetbookeeping_content_width', 640 );
}
add_action( 'after_setup_theme', 'vetbookeeping_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vetbookeeping_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vetbookeeping' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vetbookeeping' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vetbookeeping_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vetbookeeping_scripts() {
	wp_enqueue_style( 'vetbookeeping-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'vetbookeeping-style', 'rtl', 'replace' );

	wp_enqueue_script( 'vetbookeeping-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vetbookeeping_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function custom_style_sheet() {
	wp_enqueue_style( 'custom-styling', get_stylesheet_directory_uri() . '/custom.css' );
}
add_action('wp_enqueue_scripts', 'custom_style_sheet');

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function cta_grid($atts){
	ob_start();
	$data = shortcode_atts(array(
		'onetitle' => '',
		'onecontent' => '',
		'twotitle' => '',
		'twocontent' => '',
		'threetitle' => '',
		'threecontent' => '',
		'fourtitle' => '',
		'fourcontent' => ''
	),$atts);
	?>
<div class='cta-grid outer-wrapper'>

    <?php if ($data['onetitle']) { ?>
    <div class="teal-cta">
        <h2 class="teal-cta__title">
            <?php echo $data['onetitle'] ?>
        </h2>
        <p class="teal-cta__content">
            <?php echo $data['onecontent'] ?>
        </p>
    </div>
    <?php } ?>
    <?php if ($data['twotitle']) { ?>
    <div class="teal-cta">
        <h2 class="teal-cta__title">
            <?php echo $data['twotitle'] ?>
        </h2>
        <p class="teal-cta__content">
            <?php echo $data['twocontent'] ?>
        </p>
    </div>
    <?php } ?>
    <?php if ($data['threetitle']) { ?>
    <div class="teal-cta">
        <h2 class="teal-cta__title">
            <?php echo $data['threetitle'] ?>
        </h2>
        <p class="teal-cta__content">
            <?php echo $data['threecontent'] ?>
        </p>
    </div>
    <?php } ?>
    <?php if ($data['fourtitle']) { ?>
    <div class="teal-cta">
        <h2 class="teal-cta__title">
            <?php echo $data['fourtitle'] ?>
        </h2>
        <p class="teal-cta__content">
            <?php echo $data['fourcontent'] ?>
        </p>
    </div>
    <?php } ?>
</div>
<?php
	return ob_get_clean();
}
add_shortcode('cta_grid', 'cta_grid');

function three_buttons(){
	ob_start();
	?>
<div class='three-buttons inner-wrapper'>
    <a href="/faqs/" class="ghost-btn">FAQs
        <img class="book-icon" src="/wp-content/uploads/2024/06/bookkeeping-icon.png" alt="book keeping icon" />
    </a>
    <a href="/process/" class="ghost-btn">Our Process
        <img class="book-icon" src="/wp-content/uploads/2024/06/bookkeeping-icon.png" alt="book keeping icon" />
    </a>
    <a href="/pricing/" class="ghost-btn">Pricing
        <img class="book-icon" src="/wp-content/uploads/2024/06/bookkeeping-icon.png" alt="book keeping icon" />
    </a>
</div>
<?php
	return ob_get_clean();
}
add_shortcode('three_buttons', 'three_buttons');

function accordion($atts){
	ob_start();
	$data = shortcode_atts(array(
		'title' => '',
		'content' => ''
	),$atts);
	?>
<div class='ghost-btn accordion inner-wrapper'>
    <div class="accordion-head">
        <?php echo $data['title'] ?>
        <img class="book-icon" src="/wp-content/uploads/2024/06/bookkeeping-icon.png" alt="book keeping icon" />
    </div>
    <div class="accordion-body">
        <p>
            <?php echo $data['content'] ?>
        </p>
    </div>
</div>
<?php
	return ob_get_clean();
}
add_shortcode('accordion', 'accordion');

function buttons($atts){
	ob_start();
	$data = shortcode_atts(array(
		'onetitle' => '',
		'onelink' => '',
		'twotitle' => '',
		'twolink' => '',
	),$atts);
	?>
<div class='buttons-container inner-wrapper'>
    <?php if ($data['onetitle']) { ?>
    <a class="teal-btn" href="<?php echo $data['onelink'] ?>">
        <p><?php echo $data['onetitle'] ?></p>
    </a>
    <?php } ?>
    <?php if ($data['twotitle']) { ?>
    <a class="teal-btn" href="<?php echo $data['twolink'] ?>">
        <p><?php echo $data['twotitle'] ?></p>
    </a>
    <?php } ?>
</div>
<?php
	return ob_get_clean();
}
add_shortcode('buttons', 'buttons');

function book_img(){
	ob_start();
	?>
<div class='book-section'>
    <img src="/wp-content/uploads/2024/06/BOOK-iso.png" alt="book img" />
</div>
<?php
	return ob_get_clean();
}
add_shortcode('book_img', 'book_img');