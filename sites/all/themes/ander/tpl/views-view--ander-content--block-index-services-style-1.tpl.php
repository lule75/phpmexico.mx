<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div class="service_wrapper" id="service_1" data-animation-target="8">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page_title">
					<?php print $header; ?>
				</div>
			</div>
		</div>
	</div>
	<?php print $rows; ?>
	<div class="clear"></div>
</div>
<?php print $footer; ?>

<?php endif; ?>

