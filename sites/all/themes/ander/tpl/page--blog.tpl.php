<?php require_once(drupal_get_path('theme','ander').'/tpl/header.tpl.php'); 

global $base_url;

?>
<div id="blog_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog_title_heading">
                    <h1><?php print t('Nuestras últimas noticias');?></h1>
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
    unset($page['content']['system_main']['default_message']);
?>
<?php if($page['content']): ?>
<div class="blog_wrapper">
    <div class="container">
        <div class="row">
            <div class="blog_content">
                <div class="col-md-8">
                    <?php print render($page['content']);?>
                </div>
            </div>
            <?php if($page['sidebar']): ?>
                <div class="sidebar">
                    <div class="col-md-4">
                        <?php print render($page['sidebar']);?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

	
<?php require_once(drupal_get_path('theme','ander').'/tpl/footer.tpl.php'); ?>
