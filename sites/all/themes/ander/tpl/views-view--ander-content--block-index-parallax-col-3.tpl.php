<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="col-md-4">
	<?php print $header; ?>
</div>
<div class="col-md-4">
	<?php print $rows; ?>
</div>

<?php endif; ?>

