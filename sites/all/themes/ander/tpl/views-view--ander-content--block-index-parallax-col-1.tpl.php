<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="parallax_over nobottom">
	<div class="container" data-animation-target="13">
		<div class="row">
			<?php print $header; ?>
			<div class="col-md-4">
				<?php print $rows; ?>
			</div>
			<?php print $footer; ?>
		</div>
	</div>
</div>

<?php endif; ?>



