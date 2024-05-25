<?php 
//add title support
add_theme_support('title-tag');

// add js and css
add_action('wp_enqueue_scripts','dt_scripts');

function dt_scripts(){
    //css
    wp_enqueue_style('dt_bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('dt_font_awosome_icon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array('dt_bootstrap-css'), '1.0');
    wp_enqueue_style('dt_theme_style', get_theme_file_uri('/teststyle.css'), array('dt_font_awosome_icon'), '1.0'); /* main theme css file */
	wp_enqueue_style('dt_wp_style', get_theme_file_uri('/style.css'), array('dt_theme_style'), '1.0');  /* wp css file */

    //js
    wp_enqueue_script('dt_bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '1.0', true);

}


// register menu
register_nav_menus(array(
    'main_menu' => __('Main Menu'),
    'footer_menu' => __('Footer Menu'),
));

// demo site custom menu function
function rt_menu($theme_location) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $menu = get_term($locations[$theme_location], 'nav_menu');
        $menu_items = wp_get_nav_menu_items($menu->term_id);
		$menu_list = '';
 		
		if ($theme_location == 'main_menu') {
			$menu_list .= '<ul class="navbar-nav ms-auto mb-2 mb-lg-0 site-menu">' ."\n";
			
			$total_menu_items = count($menu_items);
			$c = 0;
			  
			foreach($menu_items as $menu_item) {
				$c++;
				$classes = implode(' ', $menu_item->classes);

				if($menu_item->menu_item_parent == 0) {					 
					$parent = $menu_item->ID;
					 
					$menu_array = array();
					foreach($menu_items as $submenu) {
						if($submenu->menu_item_parent == $parent) {
							$bool = true;
							$submenu_classes = implode(' ', $submenu->classes);
							$menu_array[] = '<li><a class="dropdown-item '.$submenu_classes.'" href="' . $submenu->url . '">' . $submenu->title . '</a></li>' ."\n";
						}
					}

					if(count($menu_array) > 0) {						 
						$menu_list .= '<li class="nav-item dropdown '.$classes.'">' ."\n";
						$menu_list .= '<a class="nav-link dropdown-toggle" id="navbarDropdown" href="'.$menu_item->url.'" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $menu_item->title . '</a>' ."\n";
						
						$menu_list .= ' <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">' ."\n";
							
						$menu_list .= implode("\n", $menu_array);
						
						$menu_list .= '</ul>' ."\n";						 
					} else {						 
						$menu_list .= '<li class="nav-item '.$classes.'">' ."\n";
						$menu_list .= '<a class="nav-link" href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
					}
					
					// end <li>
					$menu_list .= '</li>' ."\n";					 
				}				 
			}
			  
			$menu_list .= '</ul>' ."\n";
			
		} else if ($theme_location == 'footer_menu') {
			$total_menu_items = count($menu_items);
			$c = 0;
            $menu_list .= '<ul>' ."\n";
			foreach ($menu_items as $key => $menu_item) {
				$c++;
				$classes = implode(' ', $menu_item->classes);			
				$title = $menu_item->title;
				$url = $menu_item->url;

				if ($c < $total_menu_items) {
					$menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
				}
				else {
					$menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
				}
			}
            $menu_list .= '</ul>' ."\n";
		}
  
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
     
    echo $menu_list;
}

add_theme_support( 'post-thumbnails' );