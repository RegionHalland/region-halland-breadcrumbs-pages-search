<?php

	/**
	 * @package Region Halland Breadcrumbs Pages Search
	*/
	
	/*
	Plugin Name: Region Halland Breadcrumbs Pages Search
	Description: Front-end-plugin för breadcrumbs (bara för sidor)
	Version: 1.0.0
	Author: Roland Hydén
	License: MIT
	Text Domain: regionhalland
	*/

	// Returnera en array med breadcrumbs-info
	function get_region_halland_breadcrumbs_pages_search($id, $title, $home = '') {
		
		if ($home == '') {
			$home_name = get_bloginfo('name');
		} else {
			$home_name = $home;
		}
		
		// Titel för aktuell sida
		$title = $title;
		
		// Lägg till första posten i arrayen med breadcrumbs
		$breadcrumbs = addRegionHallandBreadcrumbsPagesSearch(array(), $home_name, get_home_url());
		
		// Hämta ID för alla "föräldrar" till aktuell sida
		$ancestors = array_reverse(get_post_ancestors($id));

		// Loopa igenom alla "föräldrar"
		foreach ($ancestors as $ancestor) {

			// Hämta "titel" och "url" för respektive post
			$breadcrumbs = addRegionHallandBreadcrumbsPagesSearch($breadcrumbs, get_the_title($ancestor), get_page_link($ancestor));
		
		}
		
		// Lägg till aktuell sidas titel
		$breadcrumbs = addRegionHallandBreadcrumbsPagesSearch($breadcrumbs, $title, false);		
		
		// Returnera arrayen
		return $breadcrumbs;

	}

	// Function för bygga array
	function addRegionHallandBreadcrumbsPagesSearch($list, $name, $url) {
		
		// Array-element med "namn" och "url"
		$list[] = array(
			'name' => $name,
			'url' => $url
		);

		// Returnera array-element
		return $list;
	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_breadcrumbs_pages_search_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen av-aktiveras
	function region_halland_breadcrumbs_pages_search_deactivate() {
		// Ingenting just nu...
	}
	
	// Aktivera pluginen och anropa metod
	register_activation_hook( __FILE__, 'region_halland_breadcrumbs_pages_search_activate');
	
	// Av-aktivera pluginen och anropa metod
	register_deactivation_hook( __FILE__, 'region_halland_breadcrumbs_pages_search_deactivate');

?>