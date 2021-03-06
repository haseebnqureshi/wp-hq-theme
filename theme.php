<?php

	/* 
	HQ_Theme
	============
	Include this script once and then instantiate the class. 
	*/

	class HQ_Theme {

		public $dir = "";
		public $localfile = "";
		public $localdir = "";
		public $post_types = array();
		public $acf_show_admin = false;

		public function __construct($localfile=null, $options=array()) {
			$this->dir = dirname(__FILE__);
			$this->localfile = $localfile ? $localfile : __FILE__;
			$this->localdir = $localfile ? dirname($localfile) : $this->dir;

			foreach ($options as $key => $value) {
				$this->$key = $value;
			}
			
			add_theme_support('menus');
			register_nav_menus(array(
				'header1' => 'Header Menu #1',
				'footer1' => 'Footer Menu #1',
				'footer2' => 'Footer Menu #2'
			));
			
			add_filter('acf/settings/path', array($this, 'acf_settings_path'));
			add_filter('acf/settings/dir', array($this, 'acf_settings_dir'));
			add_filter('acf/settings/save_json', array($this, 'acf_json_save_point'));
			add_filter('acf/settings/show_admin', ($this->acf_show_admin ? '__return_true' : '__return_false'));
			include_once("{$this->dir}/acf/acf.php");
			if (function_exists('acf_add_options_page')) { acf_add_options_page(); }

			$this->post_types = $this->_scanfiles("{$this->localdir}/cpt");

			add_action('init', array($this, 'init'), 0);
			add_filter('upload_mimes', array($this, 'filter_upload_types'));
			add_filter('wp_enqueue_scripts', array($this, 'include_assets'));
		}

		public function acf_settings_path() {
			return "{$this->dir}/acf/";
		}

		public function acf_settings_dir() {
			return get_stylesheet_directory_uri() . '/acf/';
		}

		public function acf_json_save_point() {
			return "{$this->dir}/acf-json/";
		}

		public function filter_upload_types($mimes) {
			$mimes['svg'] = 'image/svg+xml';
			$mimes['json'] = 'application/json';
			$mimes['certSigningRequest'] = 'application/certSigningRequest';
			$mimes['p12'] = 'application/p12';
			$mimes['pem'] = 'application/pem';
			$mimes['cer'] = 'application/cer';
			$mimes['crt'] = 'application/crt';
			$mimes['csr'] = 'application/csr';
			$mimes['key'] = 'application/key';
			$mimes['sql'] = 'application/sql';
			$mimes['xml'] = 'application/xml';
			$mimes['md'] = 'application/md';
			$mimes['doc'] = 'application/docx';
			$mimes['docx'] = 'application/docx';
			$mimes['xls'] = 'application/xls';
			$mimes['ai'] = 'application/ai';
			$mimes['psd'] = 'application/psd';
			return $mimes;
		}

		public function include_assets() {
			if (file_exists("{$this->localdir}/assets/css/theme.css")) {
				wp_enqueue_style(
					'uikit', 
					get_stylesheet_directory_uri() . '/assets/css/uikit.min.css'
				);
				wp_enqueue_style(
					basename($this->localdir), 
					get_stylesheet_directory_uri() . '/assets/css/theme.css',
					array('uikit')
				);
			}
			if (file_exists("{$this->localdir}/assets/js/theme.js")) {
				wp_enqueue_script(
					'uikit', 
					get_stylesheet_directory_uri() . '/assets/js/uikit.min.js',
					array('jquery'),
					'1.0.0',
					true
				);
				wp_enqueue_script(
					basename($this->localdir), 
					get_stylesheet_directory_uri() . '/assets/js/theme.js',
					array('underscore', 'jquery', 'uikit'),
					'1.0.0',
					true
				);
			}
		}

		public function init() {
			date_default_timezone_set(get_option('timezone_string') || 'America/New_York');
			$this->_loadall($this->post_types);
		}

		/* utility methods */

		public function _loadall($items=array()) {
			foreach ($items as $path) {
				include_once $path;
			}
		}

		public function _scanfiles($dir, $items=array()) {
			if (!file_exists($dir)) { return $items; }
			$items = array();
			foreach (scandir($dir) as $item) {
				if ($item == '.' || $item == '..') { continue; }
				$post_type = str_replace('.php', '', $item);
				$items[$post_type] = "{$dir}/{$item}";
			}
			return $items;
		}

	}

?>