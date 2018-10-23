<?php
/**
 * The More Themes Baby WordPress assets
 *
 * @package Mo
 * @since 1.0.0
 */

if ( ! class_exists( 'Mo_Assets' ) ) {
	/**
	 * The More Themes Baby WordPress assets class.
	 *
	 * Contains code to manage and include assets.
	 *
	 * @since 1.0.0
	 */
	class Mo_Assets extends Mo_Base {

		/**
		 * Class arguments.
		 *
		 * They set up assets to be included both in themes and plugins.
		 * In the case of plugins on both the front-end and the admin interface.
		 *
		 * @since 1.0.0
		 *
		 * @var array $arguments An array of arguments.
		 */
		public $arguments = array(
			'src_url'                 => '',
			'folder'                  => 'assets',
			'admin_folder'            => '',
			'action'                  => 'wp_enqueue_scripts',
			'version'                 => '',
			'text_domain'             => '',
			'javascript_folder'       => 'js',
			'css_folder'              => 'css',
			'images_folder'           => 'images',
			'javascript_file_handle'  => 'script',
			'css_file_handle'         => 'style',
			'javascript_file_name'    => '',
			'css_file_name'           => '',
			'javascript_extension'    => 'js',
			'css_extension'           => 'css',
			'javascript_dependencies' => array(),
			'javascript_in_footer'    => true,
			'css_dependencies'        => array(),
		);

		/**
		 * Arguments to set up enqueue for an asset.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $enqueue_arguments = array(
			'file_name'    => '',
			'extension'    => '',
			'file_handle'  => '',
			'subfolder'    => '',
			'dependencies' => array(),
			'in_footer'    => false,
		);

		/**
		 * Arguments to set up an enqueue of a script or style.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public $enqueue_script_arguments = array(
			'file_handle'  => '',
			'src'          => '',
			'dependencies' => array(),
			'timestamp'    => '',
			'in_footer'    => false,
		);

		/**
		 * Sets up the class.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments An array of arguments.
		 * @return void
		 */
		public function __construct( $arguments ) {
			$this->arguments = $this->array_merge( $this->arguments, $arguments );
			$this->setup_variables();
		}

		/**
		 * Sets up variables.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function setup_variables() {
			$this->src_url                 = $this->arguments['src_url'];
			$this->folder                  = $this->arguments['folder'];
			$this->admin_folder            = $this->arguments['admin_folder'];
			$this->action                  = $this->arguments['action'];
			$this->version                 = $this->arguments['version'];
			$this->text_domain             = $this->arguments['text_domain'];
			$this->javascript_folder       = $this->arguments['javascript_folder'];
			$this->css_folder              = $this->arguments['css_folder'];
			$this->images_folder           = $this->arguments['images_folder'];
			$this->javascript_file_handle  = $this->arguments['javascript_file_handle'];
			$this->css_file_handle         = $this->arguments['css_file_handle'];
			$this->javascript_file_name    = $this->arguments['javascript_file_name'];
			$this->css_file_name           = $this->arguments['css_file_name'];
			$this->javascript_extension    = $this->arguments['javascript_extension'];
			$this->javascript_dependencies = $this->arguments['javascript_dependencies'];
			$this->javascript_in_footer    = $this->arguments['javascript_in_footer'];
			$this->css_extension           = $this->arguments['css_extension'];
			$this->css_dependencies        = $this->arguments['css_dependencies'];
		}

		/**
		 * Adds assets.
		 *
		 * At this moment only scripts and styles are supported.
		 *
		 * @todo Add support for fonts, icons, svg and images.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function add() {
			$this->add_script();
			$this->add_style();
		}

		/**
		 * Adds a script asset.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function add_script() {
			$script = $this->setup_enqueue(
				array(
					'file_name'    => $this->javascript_file_name,
					'extension'    => $this->javascript_extension,
					'file_handle'  => $this->javascript_file_handle,
					'subfolder'    => $this->javascript_folder,
					'dependencies' => $this->javascript_dependencies,
					'in_footer'    => $this->javascript_in_footer(),
				)
			);

			/**
			 * This code is not supported by WP.org / < PHP 5.3
			 *
			 * ```
			 * add_action(
			 *		$this->action,
			 *		function() use ( $script ) {
			 *			$this->enqueue_script( $script );
			 *		}
			 *	);
			 * ```
			 */

			/**
			 * This code works, but throws the following warning in the log file:
			 *
			 * ```
			 * PHP Warning:  call_user_func_array() expects parameter 1 to be a valid callback, no array or string given in /home/cs/work/wp-best-practices/wp-includes/class-wp-hook.php on line 286
			 * ```
			 */
			add_action( $this->action, $this->enqueue_script( $script ) );

			/**
			 * This workaround might work:
			 *
			 * @todo Fix `call_user_func_array()` warning in the log file.
			 *
			 * 1. make `$script` global variable
			 * 2. make `enqueue_script` use this global variable instead of the current arguments.
			 * 3. add_action( $this->action, array( $this, 'enqueue_script' );
			 */
		}

		/**
		 * Adds a style asset.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function add_style() {
			$style = $this->setup_enqueue(
				array(
					'file_name'    => $this->css_file_name,
					'extension'    => $this->css_extension,
					'file_handle'  => $this->css_file_handle,
					'subfolder'    => $this->css_folder,
					'dependencies' => $this->css_dependencies,
				)
			);

			add_action( $this->action, $this->enqueue_style( $style ) );
		}

		/**
		 * Sets up arguments for enqueue.
		 *
		 * Mostly defines where an asset is located.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return array
		 */
		public function setup_enqueue( $arguments ) {
			$arguments = $this->array_merge( $this->enqueue_arguments, $arguments );

			$folder = $this->implode(
				'/',
				array(
					$this->src_url,
					$this->folder,
					$arguments['subfolder'],
				)
			);

			$file_name = $this->implode(
				'.',
				array(
					$this->setup_filename( $arguments ),
					$arguments['extension'],
				)
			);

			return array(
				'file_handle'  => "{$this->text_domain}-{$arguments['file_handle']}",
				'src'          => "{$folder}/{$file_name}",
				'dependencies' => $arguments['dependencies'],
				'timestamp'    => $this->version,
				'in_footer'    => $arguments['in_footer'],
			);
		}

		/**
		 * Enqueues a script.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function enqueue_script( $arguments = array() ) {
			$arguments = $this->array_merge( $this->enqueue_script_arguments, $arguments );

			if ( '' !== $arguments['src'] ) {
				wp_enqueue_script(
					$arguments['file_handle'],
					$arguments['src'],
					$arguments['dependencies'],
					$arguments['timestamp'],
					$arguments['in_footer']
				);
			}
		}

		/**
		 * Enqueues a style.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return void
		 */
		public function enqueue_style( $arguments = array() ) {
			$arguments = $this->array_merge( $this->enqueue_script_arguments, $arguments );

			if ( '' !== $arguments['src'] ) {
				wp_enqueue_style(
					$arguments['file_handle'],
					$arguments['src'],
					$arguments['dependencies'],
					$arguments['timestamp']
				);
			}
		}

		/**
		 * Sets up asset filename.
		 *
		 * If the asset filename is not specified it creates a unique filename.
		 *
		 * @since 1.0.0
		 *
		 * @param array $arguments The arguments array.
		 * @return string
		 */
		public function setup_filename( $arguments ) {
			if ( '' !== $arguments['file_name'] ) {
				return $arguments['file_name'];
			}

			return $this->implode(
				'-',
				array(
					$this->text_domain,
					$this->folder,
				)
			);
		}

		/**
		 * Decides if a script can be loaded in the footer.
		 *
		 * On the admin scripts cannot be loaded in the footer.
		 * On public they can be loaded anywhere.
		 *
		 * @since 1.0.0
		 *
		 * @return boolean
		 */
		public function javascript_in_footer() {
			if ( '' !== $this->admin_folder ) {
				return false;
			}

			return $this->javascript_in_footer;
		}
	}
} // End if().
