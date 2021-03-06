<?php require_once(drupal_get_path('theme','ander').'/tpl/header.tpl.php'); 

global $base_url;

?>

<?php print render($page['top_content']);?>

<?php print render($page['home_content']);?>

<?php require_once(drupal_get_path('theme','ander').'/tpl/footer.tpl.php'); ?>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "https://phpmexico.mx",
  "logo": "https://phpmexico.mx/sites/default/files/logo_huichol.png",
  "description": "La comunidad de PHP más avanzada de México. Nosotros tomamos en serio PHP y queremos regresar la dignidad al lenguaje, nos reunimos mensualmente en la ciudad de México a compartir conocimiento.",
  "sponsor": {
    "@type": "Organization",
    "name": "Indava",
    "url": "https://indava.com/"
  },
  "disambiguatingDescription": "Comunidad de programadores PHP en México",
  "sameAs": [
    "https://www.facebook.com/pehacheperos",
    "https://twitter.com/phpmx",
    "https://www.meetup.com/es/PHP-The-Right-Way/",
    "https://phpmx.slack.com/",
    "https://github.com/phpwaymx"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "name": "Comunidad PHP México",
  "alternateName": "Comunidad PHP",
  "url": "https://phpmexico.mx"
}
</script>

