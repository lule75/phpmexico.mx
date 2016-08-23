<?php 

global $base_url;

$out = '';


if($block->region == 'main_menu'){
	if(!empty($block->css_class)) {		
		$out .= '<nav class="contextual-links-region '.$block->css_class.'">';
	
	} else {
		$out .= '<nav class="contextual-links-region">';	
	}
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</nav>';

} elseif($block->region == 'footer_col_1' || $block->region == 'footer_col_2' || $block->region == 'footer_col_3'){
	if(!empty($block->css_class)) {		
		$out .= '<div class="contextual-links-region '.$block->css_class.'">';
	
	} else {
		$out .= '<div class="contextual-links-region">';	
	}
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h2>'.$block->subject.'</h2>';
	endif;
	$out .= $content;
	$out .= '</div><div class="divider_padding small"></div>';

} elseif($block->region == 'sidebar'){
	$out .= '<div class="contextual-links-region widget">';	
	$out .= render($title_suffix);
	if(!empty($block->css_class)) {		
		$out .= '<div class="'.$block->css_class.'">';
	} else {
		$out .= '<div>';	
	}
	if ($block->subject):
		$out .= '<h3>'.$block->subject.'</h3>';
	endif;
	$out .= $content;
	$out .= '<div class="clear"></div></div></div>';

} elseif($block->region == 'content'){
	if(!empty($block->css_class)) {		
		$out .= '<div class="contextual-links-region '.$block->css_class.'">';
	} else {
		$out .= '<div class="contextual-links-region">';	
	}
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<div class="col-md-12"><h1>'.$block->subject.'</h1></div>';
	endif;
	$out .= $content;
	$out .= '</div><div class="clear"></div><div class="divider_padding"></div>';

} elseif($block->region == 'home_content'){
	if(!empty($block_html_id) || !empty($block->css_class)) {
		if(empty($block->css_class)){
			$block->css_class = '';
		}
		if(empty($block_html_id)){
			$block_html_id = '';
		}		
		$out .= '<div id="'.$block_html_id.'" class="contextual-links-region '.$block->css_class.'">';
	
	} else {

		$out .= '<div class="contextual-links-region">';	
	}
	$out .= render($title_suffix);
	if ($block->subject):
		if(empty($block->subtitle)){
			$block->subtitle = '';
		}
		$out .= '<div class="container"><div class="row"><div class="col-md-12"><div class="page_title"><h1 class="title">'.$block->subject.'</h1><h2 class="page_subtitle">'.$block->subtitle.'</h2></div></div></div></div>';
	endif;
	$out .= $content;
	$out .= '</div>';

} else {
	if(!empty($block->css_class)) {		
		$out .= '<div class="contextual-links-region '.$block->css_class.'">';
	
	} else {
		$out .= '<div class="contextual-links-region">';	
	}
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';

}

print $out;



?>

