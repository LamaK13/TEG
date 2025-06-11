<?php
/**
 * GeneratePress.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'GENERATE_VERSION', '3.6.0' );

if ( ! function_exists( 'generate_setup' ) ) {
	add_action( 'after_setup_theme', 'generate_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function generate_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'generatepress' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		$color_palette = generate_get_editor_color_palette();

		if ( ! empty( $color_palette ) ) {
			add_theme_support( 'editor-color-palette', $color_palette );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height' => 70,
				'width' => 350,
				'flex-height' => true,
				'flex-width' => true,
			)
		);

		// Register primary menu.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'generatepress' ),
			)
		);

		/**
		 * Set the content width to something large
		 * We set a more accurate width in generate_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// Add editor styles to the block editor.
		add_theme_support( 'editor-styles' );

		$editor_styles = apply_filters(
			'generate_editor_styles',
			array(
				'assets/css/admin/block-editor.css',
			)
		);

		add_editor_style( $editor_styles );
	}
}

/**
 * Get all necessary theme files
 */
$theme_dir = get_template_directory();

require $theme_dir . '/inc/theme-functions.php';
require $theme_dir . '/inc/defaults.php';
require $theme_dir . '/inc/class-css.php';
require $theme_dir . '/inc/css-output.php';
require $theme_dir . '/inc/general.php';
require $theme_dir . '/inc/customizer.php';
require $theme_dir . '/inc/markup.php';
require $theme_dir . '/inc/typography.php';
require $theme_dir . '/inc/plugin-compat.php';
require $theme_dir . '/inc/block-editor.php';
require $theme_dir . '/inc/class-typography.php';
require $theme_dir . '/inc/class-typography-migration.php';
require $theme_dir . '/inc/class-html-attributes.php';
require $theme_dir . '/inc/class-theme-update.php';
require $theme_dir . '/inc/class-rest.php';
require $theme_dir . '/inc/deprecated.php';

if ( is_admin() ) {
	require $theme_dir . '/inc/meta-box.php';
	require $theme_dir . '/inc/class-dashboard.php';
}

/**
 * Load our theme structure
 */
require $theme_dir . '/inc/structure/archives.php';
require $theme_dir . '/inc/structure/comments.php';
require $theme_dir . '/inc/structure/featured-images.php';
require $theme_dir . '/inc/structure/footer.php';
require $theme_dir . '/inc/structure/header.php';
require $theme_dir . '/inc/structure/navigation.php';
require $theme_dir . '/inc/structure/post-meta.php';
require $theme_dir . '/inc/structure/sidebars.php';
require $theme_dir . '/inc/structure/search-modal.php';

/**
 * Enqueue Tailwind CSS from CDN
 */
function add_tailwind_cdn() {
    wp_enqueue_style(
        'tailwindcdn',
        'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css',
        array(),
        null
    );
}
add_action( 'wp_enqueue_scripts', 'add_tailwind_cdn' );

// Remove default footer elements
remove_action( 'generate_footer', 'generate_construct_footer_widgets', 5 );
remove_action( 'generate_footer', 'generate_construct_footer', 10 );

// Adding our global footer
function custom_global_footer() {
    ?>
    <footer class="bg-[#303030] text-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">
      
          <!-- 1️⃣ Brand & Description -->
          <div class="space-y-4">
            <img src="http://theedengroupcom.local/wp-content/uploads/2025/06/The_eden_group_Header_Logo.png" alt="The Eden Group Logo" class="h-10 w-auto">
			<p class="leading-relaxed">
              Connecting the world through creativity and innovation. Your go-to for all things digital.
            </p>
          </div>
      
          <!-- 2️⃣ Company Links -->
          <div>
            <h3 class="text-lg font-semibold mb-4 text-white">Company</h3>
            <ul class="space-y-2 text-sm">
              <li><a href="#" class="hover:text-white transition">About Us</a></li>
              <li><a href="#" class="hover:text-white transition">Careers</a></li>
              <li><a href="#" class="hover:text-white transition">Blog</a></li>
            </ul>
          </div>
      
          <!-- 3️⃣ Support Links -->
          <div>
            <h3 class="text-lg font-semibold mb-4 text-white">Support</h3>
            <ul class="space-y-2 text-sm">
              <li><a href="#" class="hover:text-white transition">Help Center</a></li>
              <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
              <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
            </ul>
          </div>
      
          <!-- 4️⃣ Social -->
          <div class="space-y-6">
            
      
            <!-- Social -->
            <div class="footer-social icon-content">
              <h2 class="text-2xl font-extrabold text-teal-400 mb-4 tracking-tight">
                Connect With Us
              </h2>
              <ul id="social-list" class="flex flex-wrap">
                <!-- Do NOT modify SVGs, only the wrapper -->
                <li class="icon-content">
                  <a href="https://linkedin.com/" aria-label="LinkedIn" data-social="linkedin"
                     class="relative w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-teal-400 transition">
                    <div class="filled"></div>
                    <!-- LinkedIn SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-linkedin" viewBox="0 0 16 16" xml:space="preserve">
                    <path
                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"
                        fill="currentColor"></path>
                    </svg>
                  </a>
                </li>
                <li class="icon-content">
                  <a href="#" data-social="facebook"
                     class="relative w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-teal-400 transition">
                    <div class="filled"></div>
                    <!-- Facebook SVG -->
                    <svg role="img" viewBox="0 0 24 24" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/></svg>
                  </a>
                </li>
                <li class="icon-content">
                  <a href="#" data-social="instagram"
                     class="relative w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-teal-400 transition">
                    <div class="filled"></div>
                    <!-- Instagram SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16" xml:space="preserve">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                                fill="currentColor"></path>
                        </svg>
                  </a>
                </li>
                <li class="icon-content">
                  <a href="#" data-social="buildzoom"
                     class="relative w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-teal-400 transition">
                    <div class="filled"></div>
                    <!-- BuildZoom SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" fill="currentColor" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 150 150"  xml:space="preserve"> <g id="surface1"> <path d="M65.37,15.79c12.53-2.08,25.71-0.01,37.01,5.95c13.58,7.07,24.35,19.64,29.3,34.41 c2.52,7.23,3.45,14.92,3.32,22.57c-11.03-11.38-21.98-22.84-32.98-34.24c-6.62,6.86-13.2,13.74-19.83,20.58 c-0.01-4.19,0.01-8.39-0.01-12.58c-7.91-0.01-15.81-0.01-23.71,0.01c-0.01,12.06-0.01,24.11,0,36.17 c-4.74,4.98-9.54,9.89-14.28,14.87c4.76,0.03,9.52,0,14.28,0.02c-0.03,10.48,0.02,20.97-0.02,31.44 c-11.51-3.44-22-10.35-29.65-19.81c-9.44-11.53-14.49-26.74-13.71-41.77c0.55-14.28,6.28-28.24,15.79-38.68 C39.87,24.7,52.23,17.9,65.37,15.79" fill="currentColor"> </g> </svg>
                  </a>
                </li>
                <li class="icon-content">
                    <a href="#" data-social="x" class="relative w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-teal-400 transition">
                        <div class="filled"></div>
                        <!-- X SVG -->
                        <svg role="img" viewBox="0 0 24 24" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><title>X</title><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
                       </a>
                  </li>
                <li class="icon-content">
                    <a href="#" data-social="buildzoom"
                       class="relative w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-teal-400 transition">
                      <div class="filled"></div>
                      <!-- Google Maps SVG -->
                      <svg role="img" viewBox="0 0 24 24" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><title>Google Maps</title><path d="M19.527 4.799c1.212 2.608.937 5.678-.405 8.173-1.101 2.047-2.744 3.74-4.098 5.614-.619.858-1.244 1.75-1.669 2.727-.141.325-.263.658-.383.992-.121.333-.224.673-.34 1.008-.109.314-.236.684-.627.687h-.007c-.466-.001-.579-.53-.695-.887-.284-.874-.581-1.713-1.019-2.525-.51-.944-1.145-1.817-1.79-2.671L19.527 4.799zM8.545 7.705l-3.959 4.707c.724 1.54 1.821 2.863 2.871 4.18.247.31.494.622.737.936l4.984-5.925-.029.01c-1.741.601-3.691-.291-4.392-1.987a3.377 3.377 0 0 1-.209-.716c-.063-.437-.077-.761-.004-1.198l.001-.007zM5.492 3.149l-.003.004c-1.947 2.466-2.281 5.88-1.117 8.77l4.785-5.689-.058-.05-3.607-3.035zM14.661.436l-3.838 4.563a.295.295 0 0 1 .027-.01c1.6-.551 3.403.15 4.22 1.626.176.319.323.683.377 1.045.068.446.085.773.012 1.22l-.003.016 3.836-4.561A8.382 8.382 0 0 0 14.67.439l-.009-.003zM9.466 5.868L14.162.285l-.047-.012A8.31 8.31 0 0 0 11.986 0a8.439 8.439 0 0 0-6.169 2.766l-.016.018 3.665 3.084z" fill="currentColor"/></svg>
                    </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      
        <!-- Divider + Copyright -->
        <div class="border-t border-gray-700"></div>
        <div class="py-6 text-center text-sm text-gray-500">
          © 2025 The Eden Group. All rights reserved.
        </div>
      </footer>
    <?php
}
add_action('wp_footer', 'custom_global_footer', 100);

