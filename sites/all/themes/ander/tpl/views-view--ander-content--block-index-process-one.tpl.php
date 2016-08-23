<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="process_wrapper">
	<div class="process_image"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8" data-animation-target="12">
				<?php print $rows; ?>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

