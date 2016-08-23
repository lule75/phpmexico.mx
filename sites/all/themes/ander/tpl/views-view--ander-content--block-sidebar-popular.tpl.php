<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<?php print $header; ?>
<div class="post-list-wrapper" id="popular_post">
	<?php print $rows; ?>
</div>
<div class="clear"></div>
<?php print $footer; ?>
<?php endif; ?>

