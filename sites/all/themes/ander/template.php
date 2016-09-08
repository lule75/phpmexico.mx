<?php
global $base_url;

//remove superfish css files.
function ander_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
	//unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}

function ander_preprocess_page(&$vars){
	//add js to special page
	/*
	if (isset($vars['node']) && $vars['node']->type != 'page_not_found' && $vars['node']->type != 'under_construction') {
		drupal_add_js(path_to_theme().'/assets/js/SmoothScroll.js', array('type' => 'file', 'scope' => 'header'));
	}
	*/
	if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
		$term = taxonomy_term_load(arg(2));
		$vars['theme_hook_suggestions'][] = 'page__vocabulary__' . $term->vocabulary_machine_name;
	}
	
	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}
	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__node__'. $vars['node']->nid;
	}
	if (isset($vars['node'])) :
		//print $vars['node']->type;
        if($vars['node']->type == 'page'):
            $node = node_load($vars['node']->nid);
            $output = field_view_field('node', $node, 'field_show_page_title', array('label' => 'hidden'));
            $vars['field_show_page_title'] = $output;
			//sidebar
			$output = field_view_field('node', $node, 'field_sidebar', array('label' => 'hidden'));
            $vars['field_sidebar'] = $output;
        endif;
    endif;

	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}
	
	if(isset($vars['page']['content']['system_main']['no_content'])) {
		unset($vars['page']['content']['system_main']['no_content']);
	}

}

//alter menu
function ander_menu_tree__main_menu(array $variables) {
	return '<ul>' . $variables['tree'] . '</ul>';
}

//breadcrumb
function ander_breadcrumb($variables) {
	$crumbs ='';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs .= '';
		foreach($breadcrumb as $value) {
			$crumbs .= $value.' / ';
		}
		$crumbs .= drupal_get_title();
		return $crumbs;
	}else{
		return NULL;
	}
}

//to get field of page in page.tpl
function drupal_get_subtitle() {
	$subtitle = '';
	if (arg(0) == 'node' && is_numeric(arg(1))){
		$nid = arg(1);
		$node = node_load($nid);
		if(!empty($node->field_subtitle)) {
			$subtitle = $node->field_subtitle['und'][0]['value'];
			return ' / '.$subtitle;
		}
	}
}



//alter search form
function ander_form_search_block_form_alter(&$form, &$form_state) {
	$form['search_block_form']['#attributes'] = array(	'placeholder' => 'Search...',
														'id' => 'Search',
														'class' => array('w-input','search'));
}

//alter contact site
function ander_form_contact_site_form_alter(&$form, &$form_state) {
	unset($form['name']['#title']);
	unset($form['mail']['#title']);
	unset($form['message']['#title']);
	unset($form['subject']['#title']);
	unset($form['copy']);
	
	
	$form['name']['#attributes'] = array(
					'placeholder' => 'Your name (required)',
					'id' => 'comment-name'
						   );
	$form['name']['#theme_wrappers'] = array();

	$form['mail']['#attributes'] = array(
					'placeholder' => 'Your email (required)',
					'id' => 'comment-email'
						   );
	$form['mail']['#theme_wrappers'] = array();

	$form['subject']['#attributes'] = array(
					'placeholder' => 'Your website',
					'id' => 'comment-url'
						   );
	$form['subject']['#theme_wrappers'] = array();

	$form['message']['#attributes'] = array(
					'placeholder' => 'Your message here...',
					'id' => 'comment-message'
						   );
	$form['message']['#resizable'] = False;
	$form['message']['#cols'] = 88;
	$form['message']['#rows'] = 6;
	$form['message']['#theme_wrappers'] = array();
	
	$form['actions']['#prefix'] = '<div class="clear"></div>';
	$form['actions']['#theme_wrappers'] = array();
	$form['actions']['submit']['#attributes'] = array('value' => 'Send Message','class' => array('submit_buttom'));
	
	$order = array(
    'name',
	'mail',
	'subject',
	'message',
	'actions'
  	);
 
  	foreach ($order as $key => $field) {
    	$form[$field]['#weight'] = $key;
  	}
	  
}

//alter comment form
function ander_form_comment_form_alter(&$form, &$form_state) {
	global $user;
	unset($form['author']);
	unset($form['subject']);
	unset($form['actions']['preview']);
	unset($form['comment_body'][LANGUAGE_NONE][0]['#title']);
	$form['#attributes']['class'] = array('reply-input');

	$form['comment_body'][LANGUAGE_NONE][0]['#resizable'] = false ;
	$form['comment_body'][LANGUAGE_NONE][0]['#rows'] = 6 ;
	$form['comment_body'][LANGUAGE_NONE][0]['#cols'] = 88 ;
	$form['comment_body']['#after_build'][] = 'ander_customize_comment_form';
	//$form['comment_body'][LANGUAGE_NONE][0]['#attributes']['placeholder'] = t('Add your comment...');
	$form['comment_body'][LANGUAGE_NONE][0]['#attributes']['id'] = 'comment-message';
	$form['comment_body']['#theme_wrappers'] = array();
	$form['comment_body']['#prefix'] = '<div class="textarea-block">';
	$form['comment_body']['#suffix'] = '<div class="clear"></div><label for="comment-message" class="label_comment"><strong>Your Comment</strong> (required)</label></div>';

	$form['name'] = array(
    '#type'     => 'textfield',
	'#default_value' => $user->uid ? format_username($user) : '',
    '#required' => TRUE,
    '#theme_wrappers'=> array(),
	'#attributes' => array(
					'id' => 'comment-name'
						   ),
  	);
  	$form['name']['#prefix'] = '<div class="input-block">';
	$form['name']['#suffix'] = '<label for="comment-name" class="label_comment"><strong>Name</strong> (required)</label></div>';


	$form['mail'] = array(
    '#type'     => 'textfield',
	'#default_value' => $user->uid ? $user->mail : '',
    '#required' => TRUE,
    '#theme_wrappers'=> array(),
	'#attributes' => array(
					'id' => 'comment-email'
						   ),
  	);
  	$form['mail']['#prefix'] = '<div class="input-block">';
	$form['mail']['#suffix'] = '<label for="comment-email" class="label_comment"><strong>Email</strong> (required)</label></div>';

	$user_fields = user_load($user->uid);
	$form['url'] = array(
    '#type'     => 'textfield',
    '#theme_wrappers'=> array(),
    '#default_value' => $user->uid ? $user_fields->field_website['und']['0']['value'] : '',
	'#attributes' => array(
					'id' => 'comment-url'
						   ),
  	);
	$form['url']['#prefix'] = '<div class="input-block">';
	$form['url']['#suffix'] = '<label for="comment-url" class="label_comment"><strong>Website</strong> (required)</label></div>';
  	

  	$form['actions']['#theme_wrappers'] = array();
	$form['actions']['submit']['#attributes'] = array('value' => 'Submit','class' => array('submit_post'));
	$form['actions']['#suffix'] = '<div class="clear"></div>';


	$order = array(
    'name',
    'mail',
    'url',
	'comment_body',
	'actions'
  	);

  	foreach ($order as $key => $field) {
    	$form[$field]['#weight'] = $key;
  	}

}
function ander_customize_comment_form(&$form) {  
  $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
  return $form;  
}

//alter simplenews form
function ander_form_simplenews_block_form_alter(&$form, &$form_state, $tid) {
	global $user;
	
	unset($form['mail']);
	
	$form['mail'] = array(
	'#type' => 'textfield',
	'#default_value' => $user->uid ? $user->mail : '',
	'#required' => TRUE,
	'#size' => '25',
	'#attributes' => array(
					'placeholder' => 'Please enter your email',
					'class' => array('form-control','input-lg')
						   ),
	);

	//$form['submit']['#attributes'] = array('value' => 'subscribe', 'class' => array('btn','btn-default','btn-lg'));
	$form['submit']['#prefix'] = '<span class="input-group-btn">';
	$form['submit']['#suffix'] = '</span></div>';
	
	$form['mail']['#prefix'] = '<div class="input-group">';
	$form['submit']['#attributes'] = array('value' => 'subscribe', 'class' => array('btn','btn-default','btn-lg'));
	if ($user->uid) {
		//$form['mail']['#disabled'] = TRUE;
		
		$val_tid = substr($tid,22);
		
		if ( simplenews_user_is_subscribed($user->mail,$val_tid) ) {
      		$form['submit']['#attributes'] = array('value' => 'unsubscribe', 'class' => array('btn','btn-default','btn-lg'));
			
    	}
		
	}
	
	$order = array(
    'name',
	'mail',
	'submit'
  	);
	foreach ($order as $key => $field) {
    	$form[$field]['#weight'] = $key;
  	}
}

function ander_form_commerce_cart_add_to_cart_form_alter (&$form, &$form_state) {
	//unset($form['submit']);
	$form['submit']['#attributes'] = array('class' => array('button','add_to_cart_button','product_type_simple'));
}


//next and prev button
function ander_prev_next($nid = null, $ntype = null, $op = 'p') {
	if ($op == 'p') {
		$sql_op = '<';
		$order = 'DESC';
	} else{
		$sql_op = '>';
		$order = 'ASC';
	}
	$return_string = '' ;
	$nids = db_query("SELECT n.nid FROM {node} n 
				   WHERE n.nid $sql_op :nid 
				   AND n.status = 1
				   AND n.type = :type
				   ORDER BY n.nid $order
				   LIMIT 1",array(':nid' => $nid, ':type' => $ntype))->fetchCol();
	$nodes = node_load_multiple($nids);
	if (!empty($nodes)):
		foreach ($nodes as $node) :
			$return_string .= url("node/" . $node->nid);
		endforeach;
	endif;
	return $return_string;
	
}

//add js and css
function ander_preprocess_html(&$variables) {
	global $base_url;
	//add css
	drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans:400,800,300,600,700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=PT+Sans:400,700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Lato:100,300,400', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Roboto:400,100,700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Raleway:400,300,700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Ubuntu:300,400,700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Amatic+SC:400,700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Dancing+Script:700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Oswald:400,700,300', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Josefin+Slab:300,400,600', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Josefin+Slab:300,400,600', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Six+Caps', array('type' => 'external','media' => 'all'));
	drupal_add_css(path_to_theme().'/css/reset.css', array('type' => 'file', 'scope' => 'header'));
	drupal_add_css(path_to_theme().'/css/bootstrap.css', array('type' => 'file', 'scope' => 'header'));
	drupal_add_css(path_to_theme().'/css/prettyPhoto.css', array('type' => 'file', 'scope' => 'header'));
	drupal_add_css(path_to_theme().'/css/font-awesome.css', array('type' => 'file', 'scope' => 'header'));
	drupal_add_css(path_to_theme().'/css/owl.carousel.css', array('type' => 'file', 'scope' => 'header'));
	drupal_add_css(path_to_theme().'/css/owl.theme.css', array('type' => 'file', 'scope' => 'header'));
	drupal_add_css(path_to_theme().'/css/YTPlayer.css', array('type' => 'file', 'scope' => 'header'));
	//drupal_add_css(path_to_theme().'/css/animate.css', array('type' => 'file', 'scope' => 'header'));
	drupal_add_css(path_to_theme().'/pretty/shortcodes.css', array('type' => 'file', 'scope' => 'header'));
	drupal_add_css(path_to_theme().'/rs-plugin/css/settings.css', array('type' => 'file', 'scope' => 'header','media' => 'screen'));
	drupal_add_css(path_to_theme().'/rs-plugin/css/extralayers.css', array('type' => 'file', 'scope' => 'header','media' => 'screen'));
	drupal_add_css(path_to_theme().'/style.css', array('type' => 'file', 'scope' => 'header'));
	
	drupal_add_css(path_to_theme()."/css/skins/".theme_get_setting('built_in_skins','ander'), array('type' => 'file', 'scope' => 'header'));

	$element = array(
		'#tag' => 'link',
		'#attributes' => array(
			'rel' => 'alternate stylesheet',
		    'href' => $base_url.'/'.path_to_theme().'/css/skins/blue.css',
		    'type' => 'text/css',
		    'title' => 'blue',
		),
	);
	drupal_add_html_head($element, 'switcher_skin');
	$element = array(
		'#tag' => 'link',
		'#attributes' => array(
			'rel' => 'alternate stylesheet',
		    'href' => $base_url.'/'.path_to_theme().'/css/skins/green.css',
		    'type' => 'text/css',
		    'title' => 'green',
		),
	);
	drupal_add_html_head($element, 'switcher_skin_1');
	$element = array(
		'#tag' => 'link',
		'#attributes' => array(
			'rel' => 'alternate stylesheet',
		    'href' => $base_url.'/'.path_to_theme().'/css/skins/orange.css',
		    'type' => 'text/css',
		    'title' => 'orange',
		),
	);
	drupal_add_html_head($element, 'switcher_skin_2');
	$element = array(
		'#tag' => 'link',
		'#attributes' => array(
			'rel' => 'alternate stylesheet',
		    'href' => $base_url.'/'.path_to_theme().'/css/skins/yellow.css',
		    'type' => 'text/css',
		    'title' => 'yellow',
		),
	);
	drupal_add_html_head($element, 'switcher_skin_3');
	$element = array(
		'#tag' => 'link',
		'#attributes' => array(
			'rel' => 'alternate stylesheet',
		    'href' => $base_url.'/'.path_to_theme().'/css/skins/red.css',
		    'type' => 'text/css',
		    'title' => 'red',
		),
	);
	drupal_add_html_head($element, 'switcher_skin_4');
	$element = array(
		'#tag' => 'link',
		'#attributes' => array(
			'rel' => 'alternate stylesheet',
		    'href' => $base_url.'/'.path_to_theme().'/css/skins/gray.css',
		    'type' => 'text/css',
		    'title' => 'gray',
		),
	);
	drupal_add_html_head($element, 'switcher_skin_5');
	$element = array(
		'#tag' => 'link',
		'#attributes' => array(
			'rel' => 'alternate stylesheet',
		    'href' => $base_url.'/'.path_to_theme().'/css/skins/purple.css',
		    'type' => 'text/css',
		    'title' => 'purple',
		),
	);
	drupal_add_html_head($element, 'switcher_skin_6');
	$element = array(
		'#tag' => 'link',
		'#attributes' => array(
			'rel' => 'alternate stylesheet',
		    'href' => $base_url.'/'.path_to_theme().'/css/skins/midnight.css',
		    'type' => 'text/css',
		    'title' => 'midnight',
		),
	);
	drupal_add_html_head($element, 'switcher_skin_7');
	
	drupal_add_css(path_to_theme().'/css/navi-update.css', array('type' => 'file', 'scope' => 'header'));
	
	//add js
	drupal_add_js(path_to_theme().'/js/navi-update.js', array('type' => 'file', 'scope' => 'header'));
	#drupal_add_js('http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array('type' => 'external', 'scope' => 'header'));
	drupal_add_js('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js', array('type' => 'external', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/bootstrap.min.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/jquery.prettyPhoto.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/modernizr.custom.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/jquery.scrollTo.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/retina.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/jquery.nav.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/retina.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/isotope.min.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/owl.carousel.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/jquery.mb.YTPlayer.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/waypoints.min.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/pretty/shortcodes.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/styleswitcher.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/rs-plugin/js/jquery.themepunch.tools.min.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/rs-plugin/js/jquery.themepunch.revolution.min.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(drupal_get_path('module', 'md_slider').'/js/jquery.easing.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js(path_to_theme().'/js/custom.js', array('type' => 'file', 'scope' => 'header'));
}
