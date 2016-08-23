<?php print render($title_prefix); ?>
<?php if ($rows): ?>
	
<div class="service_wrapper style2" id="service_2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page_title">
					<?php print $header; ?>
				</div>
			</div>
			<?php print $rows; ?>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php endif; ?>

