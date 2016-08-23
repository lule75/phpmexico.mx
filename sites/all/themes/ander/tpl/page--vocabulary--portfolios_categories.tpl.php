<?php require_once(drupal_get_path('theme','ander').'/tpl/header.tpl.php'); 

global $base_url;

?>

<div id="blog_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog_title_heading">
                    <h1><?php print drupal_get_title();?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
        print render($tabs);
    endif;
    print $messages;
    //unset($page['content']['system_main']['default_message']);
?>
<?php if($page['section_content']): ?>
<div class="blog_wrapper">
    <div class="container">
        <div class="row">
            <div class="blog_content">
                <div class="col-md-12">
                    <?php print render($page['section_content']);?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
	
<?php require_once(drupal_get_path('theme','ander').'/tpl/footer.tpl.php'); ?>