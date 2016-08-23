<?php require_once(drupal_get_path('theme','ander').'/tpl/header.tpl.php'); 

global $base_url;

?>

<?php print render($page['top_content']);?>

<?php print render($page['home_content']);?>

<?php require_once(drupal_get_path('theme','ander').'/tpl/footer.tpl.php'); ?>