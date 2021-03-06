<?php

	/**
	 * config.inc.php
	 *
	 * Core configuration variables and functions needed by the framework.
	 *
	 * Please DO NOT edit this file directly. Any configuration directives you want to overwrite should be
	 * redefined in <kbd>/app/config/config.inc.php</kbd> or <kbd>/app/config/config.local.inc.php</kbd>.
	 *
	 * @author Ivo Janssen <ivo@codedealers.com>
	 * @copyright Copyright (c) 2008, Ivo Janssen
	 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
	 * @package plant_core
	 * @subpackage config
	 * @uses APP_ROOT
	 * @uses APPLICATION_DIR
	 * @uses CONFIG_DIR
	 * @version 1.9
	 */

	/**
	 * Import the server/location-based local configuration
	 */
	if (file_exists(APP_ROOT . CONFIG_DIR . "config.local.inc.php")) require_once(APP_ROOT . CONFIG_DIR . "config.local.inc.php");
	
	/**
	 * Import the application configuration
	 */
	if (!file_exists(APP_ROOT . CONFIG_DIR . "config.inc.php")) die("Can't find the application config file at '" . APPLICATION_DIR . CONFIG_DIR . "config.inc.php'!");
	require_once(APP_ROOT . CONFIG_DIR . "config.inc.php");
	
	// MANDATORY LOCAL OVERWRITES
	// The defined variables below MUST be overwritten in a local config (see above)

	// Database configuration
	do_define("DB_HOST", "localhost");
	do_define("DB_NAME", "dbname");
	do_define("DB_USER", "user");
	do_define("DB_PASS", "pass");
	
	// OPTIONAL LOCAL OVERWRITES
	// The defined variables below CAN be overwritten in the {@link plant_app#config.inc.php local config}, but it's
	// not required for proper functioning of Plant
	
	// Subdirectory in which site content resides
	do_define("CONTENT_DIR", "content/");
	
	// Subdirectory in which the controllers reside
	do_define("CONTROLLER_DIR", "controllers/");
	
	// Type of Database
	do_define("DEFAULT_DB_TYPE", "mysql");
			
	// Whether to display php errors or not
	do_define("DISPLAY_ERRORS", "yes");
	
	// What kind of PHP errors to display
	do_define("DISPLAY_ERRORS_TYPE", "all");
	
	// Default string if a token turns out empty
	do_define("EMPTY_TOKEN_DEFAULT", "untitled");
	
	// Default general error when a form doesn't validate
	do_define("FORM_FIELDS_DEFAULT_ERROR", "Something was wrong with one of the fields &hellip; check below.");
	
	// Salt added to passwords for extra security
	do_define("LOGIN_PASSWORD_SALT", "pl4nt");
	
	// Subdirectory in which the plugins reside
	do_define("PLUGIN_DIR", "plugins/");
	
	// Which path to redirect to on successful login
	do_define("REDIRECT_ON_LOGIN", "siteadmin/");
	
	// Subdirectory in which the site resides
	do_define("RELATIVE_SITE_ROOT", "");
	
	// Subdirectory in which the javascripts reside
	do_define("SCRIPT_DIR", "scripts/");
	
	// Path to the page to display if a 404 occurs
	do_define("SITE_404_PATH", "error/404");
	
	// Path to the login page to display if authentication is required
	do_define("SITE_LOGIN_PATH", "login");
	
	// Filename of main CSS style sheet (if extension ommitted, .css assumed)
	do_define("SITE_MAIN_STYLESHEET", "main");
	
	// META description for search engines
	do_define("SITE_DESCRIPTION", "");

	// META keywords for search engines
	do_define("SITE_KEYWORDS", "");
	
	// Seperator for page titles in <title>
	do_define("SITE_TITLE_SEPARATOR", " &laquo; ");
	
	// Site version
	do_define("SITE_VERSION", "1.0");
	
	// Subdirectory in which the stylesheets reside
	do_define("STYLESHEET_DIR", "css/");
	
	// Subdirectory in which the templates reside
	do_define("TEMPLATE_DIR", "templates/");
	
	// Default format for the main dynamic (action-based) template
	// This is also used when templates are auto-generated through the site admin
	do_define("TEMPLATE_DEFAULT_FORMAT", "%controller%-%action%");
		
	// Extension for all templates
	do_define("TEMPLATE_EXTENSION", "tpl");
	
	// How many users to display per page in the Users part of the admin
	do_define("USERS_PER_PAGE", 50);
	
	// APPLICATION CONSTANTS (DO NOT OVERWRITE)
	// These variables are used in the main code. It's wise to leave these 'as is'.
	
	// Prefix used for "action" methods in controller classes
	define("ACTION_METHOD_PREFIX", "action");
	
	// The name of the caching file for classes
	define("CACHE_CLASS_FILE", "classes.inc.php");
		
	// Subdirectory in which the caches reside
	define("CACHE_DIR", "cache/");
		
	// The name of the caching file for scripts
	define("CACHE_SCRIPT_FILE", "scripts.inc.php");
	
	// The name of the caching file for stylesheets
	define("CACHE_STYLESHEET_FILE", "stylesheets.inc.php");
	
	// The name of the caching file for templates
	define("CACHE_TEMPLATE_FILE", "templates.inc.php");
	
	// File to use as a guide when generating a new controller
	define("CONTROLLER_GUIDE", "controller");
	
	// Action that will be assumed if none is specified or if the requested action method can't be found
	define("DEFAULT_ACTION_NAME", "main");
	
	// Default filters called on every filtering job (capitalization is irrelevant) (comma-delimited)
	define("FILTER_DEFAULT_FILTERS", "toUTF8");
	
	// Prefix used for filter classes
	define("FILTER_PREFIX", "Filter");
	
	// Name of the framework
	define("FRAMEWORK_NAME", "Plant");
	
	// Version of this framework
	define("FRAMEWORK_VERSION", "1.1");
	
	// Guide extension
	define("GUIDE_EXTENSION", "guide");
	
	// Name prefix for link tables (EG '<prefix>_employee_project')
	define("LINK_TABLE_PREFIX", "link");
	
	// Seperator in link table names (EG 'link<seperator>employee<seperator>project')
	define("LINK_TABLE_SEPERATOR", "_");
	
	// Expiration of login cookie (in seconds)
	define("LOGIN_COOKIE_EXPIRE", 5184000);
	
	// Name of the cookie used for logging in
	define("LOGIN_COOKIE_NAME", "PlantCookie");
	
	// How deep the Model linking system keeps linking using the same data
	define("MODEL_LINKING_DEPTH", 2);
	
	// Amount of times the built-in Model tokenizer tries to make a token before giving up
	define("MODEL_TOKENIZER_MAX_TRIES", 50);
	
	// Rebuilds the cache every time the script is shut down.
	// Set this constant to false and the cache file will be built every time a class is added to the cache.
	define("REBUILD_CACHE_ON_SHUTDOWN", true);
	
	// Timezone in which the owner of the website resides
	// List of timezones at http://us3.php.net/manual/en/timezones.php
	define("SITE_TIMEZONE", "America/Los_Angeles");
	
	// File to use as a guide when generating a new template
	define("TEMPLATE_GUIDE", "template");
	
	// GLOBAL FUNCTIONS

	/**
	 * Define Value Controller
	 *
	 * Makes sure configuration directives are only defined once so local config directives
	 * can get precedence over more general ones
	 * @param string $key All uppercase config directive
	 * @param string|null $val Value of directive
	 * @return void
	 */
	function do_define($key, $val = NULL) {
		if (!defined($key)) {
			define($key, $val);
		}
	}
	
	/**
	 * Config Directive Retrieval
	 *
	 * Retrieve the value of a configuration directive. This function will check for its existence before returning the value 
	 * and throw an Exception if not found.
	 * @param string $keyname All uppercase config directive
	 * @return mixed
	 */
	function config($keyName) {
		if (!defined($keyName)) throw new Exception("Config directive '" . $keyName . "' needed, but not defined in config.inc!");
		return eval("return " . $keyName . ";");
	}

?>