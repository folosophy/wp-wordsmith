<?php

class Wordsmith {

	protected $loader;
  protected $plugin_name;
  protected $version;

  // Initialize
	public function __construct() {
		$this->plugin_name = 'wp-wordsmith';
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

  // Load dependencies
	private function load_dependencies() {
		require_once plugin_dir_path(dirname(__FILE__ )) . 'inc/loader.php';
    require_once plugin_dir_path(dirname(__FILE__ )) . 'admin/admin.php';
    require_once plugin_dir_path(dirname(__FILE__ )) . 'public/public.php';
		$this->loader = new WordsmithLoader();
	}

  // Define admin hooks
	private function define_admin_hooks() {
		$plugin_admin = new WordsmithAdmin($this->get_plugin_name());

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Plugin_Name_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Plugin_Name_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
