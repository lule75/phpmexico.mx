<?php

	if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>

<div class="comments-list">
    <?php print render($content['comments']); ?>
    <div id="response">
        <h3 class="blogpost-title"><?php print t('Leave a Comment');?></h3>
        <?php print render($content['comment_form'])?>
    </div>
</div>



<?php

	}

?>

