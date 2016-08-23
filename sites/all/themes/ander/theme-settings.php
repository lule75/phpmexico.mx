<?php

function ander_form_system_theme_settings_alter(&$form, $form_state) {
	$theme_path = drupal_get_path('theme', 'ander');
  	$form['settings'] = array(
      '#type' =>'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
	  '#attached' => array(
					'css' => array(drupal_get_path('theme', 'ander') . '/css/drupalet_base/admin.css'),
					'js' => array(
						drupal_get_path('theme', 'ander') . '/js/drupalet_admin/admin.js',
					),
			),
  	);
	
	// Tracking code & Css custom
	//==============================
	$form['settings']['general_setting'] = array(
		'#type' => 'fieldset',
		'#title' => t('General Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['general_setting']['general_setting_tracking_code'] = array(
		'#type' => 'textarea',
		'#title' => t('Tracking Code'),
		//'#default_value' => theme_get_setting('general_setting_tracking_code', 'ander'),
	);
	$form['settings']['custom_css'] = array(
		'#type' => 'fieldset',
		'#title' => t('Custom CSS'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['custom_css']['custom_css'] = array(
		'#type' => 'textarea',
		'#title' => t('Custom CSS'),
		//'#default_value' => theme_get_setting('custom_css', 'ander'),
		'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	);
	//========= End ================
	
	
	$form['settings']['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  	);
	$form['settings']['footer']['footer_copyright_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Copyright message'),
      '#default_value' => theme_get_setting('footer_copyright_message','ander'),
  	);

	
	$form['settings']['style'] = array(
      '#type' => 'fieldset',
      '#title' => t('Style Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  	);
	$form['settings']['style']['switcher'] = array(
      '#type' => 'select',
      '#title' => t('On / Off Switcher Icon:'),
      '#options' => array('1' => t('On'), '2' => t('Off')),
      '#default_value' => theme_get_setting('switcher','ander'),
	  
  	);
  	$form['settings']['style']['built_in_skins'] = array(
      	'#type' => 'radios',
    	'#title' => t('Built-in Skins'),
    	'#options' => array(
	        'blue.css' => t('Blue'),
	        'green.css' => t('Green'),
	        'orange.css' => t('Orange'),
	        'yellow.css' => t('Yellow'),
	        'red.css' => t('Red'),
	        'gray.css' => t('Gray'),
	        'purple.css' => t('Purple'),
	        'midnight.css' => t('Midnight'),
    	),
    	'#default_value' => theme_get_setting('built_in_skins','ander')
  	);
	
	
}