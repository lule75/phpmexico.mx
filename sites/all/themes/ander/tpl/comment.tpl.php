<?php 

global $base_url;

?>

<div class="comment">
    <article>
        <div class="comment-head">
            <div class="post-info">
                <a href="#" class="post-avatar">
                    <?php

                        if($picture){

                            print strip_tags($picture,'<img>') ; 

                        }  else {

                            print '<img src="http://dummyimage.com/50x50" alt="Default User Picture"/>';

                        }

                    ?>
                </a>
                <a href="#" class="post-author"><?php print $author;?></a>
                <time datetime="2013-10-30T18:55:25+00:00"><?php print 'On '.format_date($node->created, 'custom', 'd M, Y'); ?></time>
                <span class="ago">
                    <?php print t('!interval ago', array('!interval' => format_interval(time() - $node->created))); ?>
                    
                </span>
                <div class="clear"></div>
            </div>
        </div>
        <div class="comment-body">
            <p><?php print strip_tags(render($content['comment_body']));?></p>
            <?php if($content['links']['comment']['#links']['comment-reply']):?>
                <a href="<?php print url($content['links']['comment']['#links']['comment-reply']['href']); ?>" class="m-btn red-stripe replybutton" title="Reply">Reply</a>&nbsp;
            <?php endif; ?>
            <div class="clear"></div>
        </div>
    </article>
</div>



