<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="grid">
	<?php print $rows; ?>
</div>
<?php print $pager; ?>

<?php endif; ?>

