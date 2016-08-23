<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<?php print $header; ?>
<div class="grid" data-animation-target="10">
	<?php print $rows; ?>
</div>

<?php endif; ?>

