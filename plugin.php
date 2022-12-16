<?php
/**
 * Plugin Name: Lux Digital Blocks
 * Description: Blocos de layout criados exclusivamente para o site da Lux Digital
 * Author: Estevão Rolim
 * Author URI: https://linkedin.com/in/estevaoprolim
 * Version: 1.0
 * 
 * @package WordPress
 * @subpackage Lux-Blocks
 * @author Estevão Rolim <ETVO@github.com>
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Core constants 
define("PLUGIN_DIR", plugin_dir_path(__DIR__) . "lux-blocks/");
define("PLUGIN_URL", plugins_url("lux-blocks/"));
define("PLUGIN_CLASS", "Lux_Blocks");

/**
 * Lux Blocks plugin
 */
final class Lux_Blocks {

    /**
     * Setup plugin
     * 
     * @since 1.0
     */
    public function __construct()
    {
        $this->plugin_constants();

        // Initialize blocks
        add_action('init', array(PLUGIN_CLASS, 'plugin_blocks'));

        // Enqueue scripts
        add_action('wp_enqueue_scripts', array(PLUGIN_CLASS, 'plugin_css'));
        add_action('wp_enqueue_scripts', array(PLUGIN_CLASS, 'plugin_js'));

        // Enqueue scripts
        add_action('admin_enqueue_scripts', array(PLUGIN_CLASS, 'plugin_admin_css'));
        add_action('admin_enqueue_scripts', array(PLUGIN_CLASS, 'plugin_admin_js'));
        
        // Filter to add custom block category
        add_filter('block_categories', array(PLUGIN_CLASS, 'custom_blocks_category'), 10, 2);
    }

    /**
     * Define plugin constants
     *
     * @since 1.0
     */
    public static function plugin_constants() {
        
        // JS and CSS paths
        define('PLUGIN_CSS_URL', PLUGIN_URL . 'assets/css/');
        define('PLUGIN_JS_URL', PLUGIN_URL . 'assets/js/');

        // Include paths
        define('PLUGIN_BLOCKS_DIR', PLUGIN_DIR . 'blocks/');
        define('PLUGIN_BLOCKS_URL', PLUGIN_URL . 'blocks/');

        // Image paths
        define('PLUGIN_IMG_URL', PLUGIN_URL . 'assets/img/');
    }

    /**
     * Include blocks files
     *
     * @since 1.0
     */
    public static function plugin_blocks() {

        $dir = PLUGIN_BLOCKS_DIR;

        include_once $dir . '/block-registerer.php';
    }

    /**
     * Enqueue plugin CSS
     *
     * @since 1.0
     */
    public static function plugin_css() {
        $dir = PLUGIN_CSS_URL;

        // Registering the blocks.css for frontend + backend
        wp_enqueue_style(
            'plugin-blocks-css', 
            $dir . 'blocks.css',
            is_admin() ? array('wp-editor') : null,
            null
        );
    }

    /**
     * Enqueue plugin JS
     *
     * @since 1.0
     */
    public static function plugin_js() {
        $dir = PLUGIN_JS_URL;

        // Registering the blocks.js file in the dist folder
        wp_enqueue_script(
            'plugin-front-js',
            $dir . 'front.js',
            array(),
            null,
            true
        );
    }
    
    /**
     * Enqueue plugin admin CSS
     * 
     * @since 1.0
     */
    public static function plugin_admin_css() {
        $dir = PLUGIN_CSS_URL;

        // Registering the editor.css for backend
        wp_enqueue_style(
            'plugin-editor-css', 
            $dir . 'editor.css',
            array('wp-edit-blocks'),
            null
        );
    }
    
    /**
     * Enqueue plugin admin JS
     *
     * @since 1.0
     */
    public static function plugin_admin_js() {
        $dir = PLUGIN_JS_URL;

        // Registering the blocks.js file in the dist folder
        wp_enqueue_script(
            'plugin-blocks-js',
            $dir . 'blocks.js',
            array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
            null,
            true
        );

        // WP Localized globals. Use dynamic PHP data in JavaScript via global object (array).
        wp_localize_script(
            'plugin-blocks-js',
            'pluginGlobal',
            [
                'dirPath' => PLUGIN_DIR,
                'dirUrl'  => PLUGIN_URL,
                'homeUrl' => home_url(),
            ]
        );
    }

    /**
     * Register custom category for Gutenberg blocks
     *
     * @param array $categories Categories already registered
     * @param WP_Post $post unused
     * @return array Updated list of block categories
     * @since 1.0
     */
    public static function custom_blocks_category($categories, $post) {
        return array_merge(
            array(
                array(
                    'slug' => 'luxblock',
                    'title' => __("Lux Blocks")
                )
            ),
            $categories,
        );
    }
}

new Lux_Blocks();