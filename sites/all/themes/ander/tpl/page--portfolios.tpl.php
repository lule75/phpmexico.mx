<?php require_once(drupal_get_path('theme','ander').'/tpl/header.tpl.php'); 

global $base_url;

?>
<div id="blog_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog_title_heading">
                    <h1><?php print $node->title ?></h1>
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
<?php if($page['content']): ?>
<div class="container" style="margin-top: 25px;">
    <div class="item-data">
        <div class="helper">
            <div class="row">
                <?php print render($page['content']);?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
