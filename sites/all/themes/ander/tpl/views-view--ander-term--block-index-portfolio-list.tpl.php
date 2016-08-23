<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<?php print $header; ?>
<section id="options" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul id="filters" class="clearfix">
					<li class="active"><a href="#" data-filter="*">All</a></li>
					<?php print $rows; ?>
				</ul>
				<?php print $footer; ?>		
			</div>
		</div>
	</div>
</section>


<?php endif; ?>

