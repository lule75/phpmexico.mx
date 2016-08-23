<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div class="about_wrapper">
	<div class="about_image" data-animation-target="3"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-6">
				<div class="about_content" data-animation-target="4">
					<?php print $header; ?>
					<div class="divider_padding"></div>
					<div class="skill">
						<?php print $rows; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>

<?php endif; ?>

