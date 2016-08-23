<?php
global $base_url;

?>
<?php 
    if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
        print render($tabs);
    endif;
    print $messages;
    //unset($page['content']['system_main']['default_message']);
?>
<?php if($page['content']): ?>
<div class="container">
    <div class="item-data">
        <div class="helper">
            <div class="row">
                <?php print render($page['content']);?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>