<?php 
global $base_url, $base_root;

$node_author = user_load($node->uid);

$img_url = '';
if(isset($node->field_image)){

	$img_uri = @$node->field_image['und'][0]['uri'];

	$img_url = file_create_url($img_uri);

	$img_uri_1 = @$node->field_image['und'][1]['uri'];

}
?>
<?php if($page) { ?>
<div class="blog-item blog-post">
	<div class="the-date-big">
		<a href="#">
			<span class="number"><?php print format_date($node->created, 'custom', 'd');?></span>
			<span class="month"><?php print format_date($node->created, 'custom', 'M');?></span>
		</a>
	</div>
	<a href="<?php print $node_url; ?>">
		<div class="img-container-blog" style="background-image: url(<?php print $img_url; ?>);">
		</div>
	</a>
	<div class="blog-boddy">
		<div class="the-title">
			<h1>
				<a href="<?php print $node_url; ?>"><?php print $title?></a>
			</h1>
		</div>
		<div class="metas">
			<div class="the-author"><a href="#"><i class="fa fa-user"></i><?php print $node->name; ?></a></div>
			<div class="the-date"><a href="#"><i class="fa fa-calendar"></i><?php print format_date($node->created, 'custom', 'l, d M, Y');?></a></div>
			<div class="the-comments"><a href="#"><i class="fa fa-comment"></i><?php print $comment_count.' Comments';?></a></div>
			<div class="clear"></div>
		</div>
		<?php print render($content['body']); ?>
	</div>
</div>
<div class="post_data">
	<div class="used_tags">
		<span><?php print t('Used Tags: ');?></span>
		<?php print strip_tags(render($content['field_tags']),'<a><ul><li>');?>
	</div>
	<div class="clear"></div>
</div>
<div class="about_the_author">
	<div class="author_avatar">
		<?php print theme('user_picture', array('account' => $node_author)); ?>
	</div>
	<h4><?php print $name;?></h4>
	<p><?php print $node_author->field_about['und'][0]['value']?></p>
	<div class="clear"></div>
</div>
<section id="comments">
	<h3 class="blogpost-title">Comments (<?php print $comment_count; ?>)</h3>
	<?php print render($content['comments']);?>
</section>

<?php } else { ?>
<div class="blog-item">
	<div class="the-date-big">
		<a href="#">
			<span class="number"><?php print format_date($node->created, 'custom', 'd');?></span>
			<span class="month"><?php print format_date($node->created, 'custom', 'M');?></span>
		</a>
	</div>

	<a href="<?php print $node_url; ?>">
		<div class="img-container-blog" style="background-image: url(<?php print $img_url; ?>);">
		</div>
	</a>

	<div class="blog-boddy">
		<div class="the-title">
			<h1>
				<a href="<?php print $node_url; ?>"><?php print $title; ?></a>
			</h1>
		</div>
		<div class="metas">
			<div class="the-author"><a href="#"><i class="fa fa-user"></i><?php print $node->name; ?></a></div>
			<div class="the-date"><a href="#"><i class="fa fa-calendar"></i><?php print format_date($node->created, 'custom', 'l, d M, Y');?></a></div>
			<div class="the-comments"><a href="#"><i class="fa fa-comment"></i><?php print $comment_count.' Comments';?></a></div>
			<div class="clear"></div>
		</div><!--metas-->

		<p><?php print render($content['body']); ?></p>
		<a href="<?php print $node_url; ?>"><div class="read_more black"><span>Read More</span></div></a>
	</div>
</div>
<?php } ?>