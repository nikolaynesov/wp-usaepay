<?php

namespace usaepay;

/**
 * Class Admin
 * @package usaepay
 */
class Admin {

	/**
	 * @var
     */
	private $config;

	/**
	 * @param $config
     */
	function __construct ($config) {
		
		$this->config = $config;
		$this->hook();

	}

	/**
	 * WP Filters and Actions
     */
	public function hook() {
		add_action( 'admin_menu', array($this, 'usaepay_add_admin_menu') );
		add_action( 'admin_init', array($this, 'usaepay_settings_init') );
	}

	/**
	 * Add options Page action
     */
	function usaepay_add_admin_menu(  ) {

		add_options_page( 'usaepay', 'USAePay', 'manage_options', 'usaepay', array($this, 'usaepay_options_page') );

	}

	/**
	 * Admin page init
     */
	function usaepay_settings_init(  ) {

		register_setting( 'pluginPage', 'usaepay_settings' );

		add_settings_section(
			'usaepay_plugin',
			__( 'USAePay Settings', 'usaepay' ),
			array($this, 'usaepay_settings_section_callback'),
			'pluginPage'
		);

		add_settings_field(
			'key',
			__( 'Key', 'usaepay' ),
			array($this, 'key_render'),
			'pluginPage',
			'usaepay_plugin'
		);

		add_settings_field(
			'sandbox',
			__( 'Use SandBox', 'usaepay' ),
			array($this, 'sandbox_render'),
			'pluginPage',
			'usaepay_plugin'
		);

		add_settings_field(
			'testmode',
			__( 'Use Test Mode', 'usaepay' ),
			array($this, 'testmode_render'),
			'pluginPage',
			'usaepay_plugin'
		);


	}

	/**
	 * Render key field
     */
	function key_render(  ) {
		?>
		<input type='text' name='usaepay_settings[key]' value='<?php echo usaepay_get_key(); ?>' size="40">
		<?php

	}

	/**
	 * Render sandbox field
     */
	function sandbox_render(  ) {
		?>
		<input type='checkbox' name='usaepay_settings[sandbox]' <?php checked( usaepay_get_sandbox(), 1 ); ?> value='1'>
		<?php

	}

	/**
	 * Render Test Mode field
	 */
	function testmode_render(  ) {
		?>
		<input type='checkbox' name='usaepay_settings[testmode]' <?php checked( usaepay_get_testmode(), 1 ); ?> value='1'>
		<?php

	}

	/**
	 * Section description
     */
	function usaepay_settings_section_callback(  ) {

		echo __( 'Merchants Source key must be generated within the USAePay console.', 'usaepay' );

	}

	/**
	 * Options page
     */
	function usaepay_options_page(  ) {

		?>
		<form action='options.php' method='post'>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

	}
		
}

?>