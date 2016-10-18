<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php print $head_title; ?></title>
<?php print $styles; ?><?php print $head; ?>
<?php global $base_url; ?>

<?php
	//Tracking code
	$tracking_code = theme_get_setting('general_setting_tracking_code', 'ander');
	print $tracking_code;
	//Custom css
	$custom_css = theme_get_setting('custom_css', 'ander');
	if(!empty($custom_css)):
?>
<style type="text/css" media="all">
<?php print $custom_css;?>
</style>
<?php
	endif;
?>
</head>
<body class="<?php if($is_front): print 'front-page'; endif;?> <?php print $classes; ?>" <?php print $attributes;?> >
	<div id="top"></div>
	<div id="preloader">
	    <div id="status">&nbsp;</div>
	</div>
	<?php print $page_top; ?>
	<?php print $page; ?>

	<?php print $scripts; ?>
	<?php print $page_bottom; ?>

	<?php 
		if(!empty($_REQUEST["switcher"])){
			$switcher = $_REQUEST["switcher"];
		} else {
			$switcher = theme_get_setting('switcher', 'ander'); 
		}
		
		if(empty($switcher)) $switcher = '1';

		if($switcher == '1') {
			require_once(drupal_get_path('theme','ander').'/tpl/switcher.tpl.php'); 
		}
		
	?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://www.phpmexico.mx",
  "logo": "http://phpmexico.mx/sites/default/files/logo_huichol.png",
  "place": "Mexico City",
  "description": "La comunidad de PHP más avanzada de México. Nosotros tomamos en serio PHP y queremos regresar la dignidad al lenguaje, nos reunimos mensualmente en la ciudad de México a compartir conocimiento.",
  "sponsor": "Indava",
  "disambiguatingDescription": "Comunidad de programadores PHP en México",
  "sameAs": [
    "https://www.facebook.com/pehacheperos",
    "https://twitter.com/phpmx",
    "https://www.meetup.com/PHP-The-Right-Way",
    "https://phpmx.slack.com/"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "name": "PHP México",
  "alternateName": "PHP Mexico",
  "url": "http://www.phpmexico.mx"
}
</script>

</body>
</html>

