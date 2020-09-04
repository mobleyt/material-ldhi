<?php

function material_public_nav_main(){

	$nav = public_nav_main()->setUlClass('right hide-on-med-and-down');
	
	// create domdocument from public_nav_main output for parsing
	$menu = new DOMDocument();	
	$menu->loadHTML($nav);
    
    // append search li to end
    // Navigate to the ul
	$ulNav = $menu->getElementsByTagName('ul')->item(0);

	// 0 for the first li, etc..
	$node = $ulNav->childNodes->item(100);
	
    // Create the li
	$searchLi = $menu->createElement('li');

	// Create the link (products for the example)
	$searchA = $menu->createElement('a', 'Search');
	$searchA->setAttribute('class', 'waves-effect waves-light modal-trigger');
	$searchA->setAttribute('href', '#searchModal');
	$searchA->setAttribute('alt', 'Search');

	// Add it to the li
	$searchLi->appendChild($searchA);
	
	// Add to the list before the specified item
	$ulNav->insertBefore($searchLi, $node);
    
    // iterate over list items, check for child ul's, do stuff
	foreach ($menu->getElementsByTagName('li') as $li) {
	    // generate unique id for parent and child connection
		$uniqueId = uniqid();

		if($li->getElementsByTagName('ul')->length !== 0){
			$parentLink = $li->childNodes->item(1);
			
			$icon = $menu->createElement('i', 'arrow_drop_down');
			$iconClass = $menu->createAttribute('class');
			$iconClass->value = 'material-icons right';
			$icon->appendChild($iconClass);
			
	    	// create attributes for parent a
	        $aData = $menu->createAttribute('data-activates');
	        $aClass = $menu->createAttribute('class');

			// values for the created attributes
			$aData->value = $uniqueId;
			$aClass->value = 'dropdown-button';

			// append attributes to parent a
			$parentLink->appendChild($aData);
			$parentLink->appendChild($aClass);
			$parentLink->appendChild($icon);
			
			// clear href value for parent a
			$parentLink->setAttribute('href', '#!');


			foreach ($li->getElementsByTagName('ul') as $ul) {
	    	    	
		    	// create attributes for child ul
	    	    $ulId = $menu->createAttribute('id');
	        	$ulClass = $menu->createAttribute('class');

				// values for the created attributes
				$ulId->value = $uniqueId;
				$ulClass->value = 'dropdown-content';

				// append attributes to child ul
				$ul->appendChild($ulId);
				$ul->appendChild($ulClass);			
			}
		}
		$nav = $menu->saveHTML();		
	}
	return $nav;
}



function material_exhibit_builder_display_random_featured_exhibit()
{
    $html = '<div id="featured-exhibit" class="valign">';
    $featuredExhibit = exhibit_builder_random_featured_exhibit();
    $html .= '<h4 class="lightHeader">' . __('Featured Exhibit') . '</h4>';
    if ($featuredExhibit) {
        $html .= get_view()->partial('exhibits/single.php', array('exhibit' => $featuredExhibit));
    } else {
        $html .= '<p>' . __('You have no featured exhibits.') . '</p>';
    }
    $html .= '</div>';
    $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);
    return $html;
}



function has_current_family($ancestors, $children, $pageID)
{

$family = array_merge($ancestors, $children);

foreach ($family as $key => $val) {
       if ($val['id'] === $pageID) {
           return true;
       }
   }
   return null;


}



function exhibit_builder_current_page_summary($exhibitPage = null, $pageID)
{
    if (!$exhibitPage) {
        $exhibitPage = get_current_record('exhibit_page');
    }
    
    
    $ancestors = $exhibitPage->getAncestors();
    $children = $exhibitPage->getChildPages();
    $hasCurrent = has_current_family($ancestors, $children, $pageID);
    
    
    if (($hasCurrent) && (!$ancestors)) {

    $html = '<li class="current-group-top" >'
          . '<h6><a href="' . exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) . '">'
          . metadata($exhibitPage, 'title') .'</a></h6>';
    }
    
    elseif (($hasCurrent) && ($ancestors)) {

    $html = '<li class="current-group-child" >'
          . '<a href="' . exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) . '">'
          . metadata($exhibitPage, 'title') .'</a>';
    }
    
    elseif (($exhibitPage->id == $pageID) && ($ancestors)) {

    $html = '<li class="current-page-child" ><span class="current">'
          . '<a href="' . exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) . '">'
          . metadata($exhibitPage, 'title') .'</a></span>';
    }
    
    elseif (($exhibitPage->id == $pageID) && (!$ancestors)) {

    $html = '<li class="current-page-top" >'
          . '<h6><a href="' . exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) . '">'
          . metadata($exhibitPage, 'title') .'</a></h6>';
    }
        
    elseif ((!$ancestors) && (!$hasCurrent)){

    $html = '<li class="not-current-top">'
          . '<h6><a href="' . exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) . '">'
          . metadata($exhibitPage, 'title') .'</a></h6>';
    }  
    
    else {

    $html = '<li class="not-current-child">'
          . '<a href="' . exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) . '">'
          . metadata($exhibitPage, 'title') .'</a>';
    } 
    
    if ($children) {
        $html .= '<ul class="show-children">';
        foreach ($children as $child) {
            $html .= exhibit_builder_current_page_summary($child, $pageID);
            release_object($child);
        }
        $html .= '</ul>';
    }
    $html .= '</li>';
    return $html;
}



