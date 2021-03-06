<?php

	/**
	 * AdminController.class.php
	 *
	 * @package plant_core
	 * @subpackage controllers
	 */
	 
	/**
	 * Core Admin Controller
	 *
	 * Controls basic functionality for actions/properties in the admin section
	 *
	 * @author Ivo Janssen <ivo@codedealers.com>
	 * @copyright Copyright (c) 2009, Ivo Janssen
	 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
	 * @package plant_core
	 * @subpackage controllers
	 * @version 1.4
	 */
	class AdminController extends Controller {
		
		/**
		 * @see Controller::setProperties()
		 */
		protected function setProperties() {
		
			// Set meta tags
			$this->setMeta("robots", "none");
			
			// Set stylesheets
			$this->removeStyleSheets();
			$this->setStyleSheet("admin");
			$this->setStyleSheet("admin-ie", "all", "IE");
						
			// Set templates
			$this->setTemplates("header,admin-nav,%controller%-%action%,admin-footer");
			
			// Return user not logged in
			if (!$this->user->isLoggedIn()) return false;
			
			// Set navigation used throughout admin pages
			$navQuery["joins"][] = "JOIN path AS parentpath ON parentpath.path = '" . $this->getToken() . "' AND parentpath.id = path.parent";
			if (!$this->user->is("admin")) $navQuery["joins"][] = "JOIN link_path_usergroup ON path.id = link_path_usergroup.path_id AND link_path_usergroup.usergroup_id = " . $this->user->getGroup()->getID();
			$navQuery["order"] = "path.title ASC";
			
			$adminNav = array();
			if ($navPaths = Model::getAllSQL("path", $navQuery)) {
				foreach($navPaths as $navPath) {
					$adminNav[ucfirst($navPath->getPath())] = $this->getPath() . $navPath->getPath() . "/";
				}
			}
			$this->set("adminTitle", preg_replace("/^\\$/", "", $this->getPathModel()->getTitle()));
			$this->set("adminNav", $adminNav);
			
			// JS
			$this->removeJavascripts();
			$this->setJavascript("//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js");
			// Set JS to fix PNGs for IE < 7
			$this->setJavascript("pngfix", "defer", "lt IE 7");
			$this->setJavascript("admin");
			
		}
			
	}
	
?>