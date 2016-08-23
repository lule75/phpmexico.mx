<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div id="blog-carousel" class="" data-animation-target="20">
	<?php print $rows; ?>
</div>

<?php endif; ?>

