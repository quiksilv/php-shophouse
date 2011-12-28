<ul class="menu">
	<?php foreach($items as $key => $value): ?>
	<li id="<?php echo str_replace(" ", "_", $key); ?>">
		<?php echo $html->link($key, "/products/index/" . $type . "/" . $key); ?>
		<ul class="submenu" id="<?php echo str_replace(" ", "_", $key); ?>">
			<?php foreach($value as $k => $v): ?>
				<?php if(!empty($v) ): ?>
					<li><?php echo $html->link($k, "/products/index/" . $type . "/" . $k); ?>
				<?php else: ?>
					<li><span><?php echo $k; ?></span>
				<?php endif; ?>
				<ul id="<?php echo str_replace(" ", "_", $k); ?>" class="items">
					<?php foreach($v as $unit): ?>
						<li id="<?php echo $unit['Product']['reference_number']; ?>">
							<?php echo $html->link($unit['Product']['name'], '/products/view/' . $unit['Product']['reference_number']); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
</ul>
<script type="text/javascript">
	function initMenu() {
		var product_name = "<?php echo str_replace(" ", "_", $session->read('Product.name') ); ?>";
		var product_ref = "<?php echo $session->read('Product.reference_number'); ?>";

		$('.menu ul').hide();
		if(product_name) {
			$('li #' + product_name).show();
			$('.submenu ul#' + product_name).parent().parent().show();
			$('.submenu ul#' + product_name).show();
		}
		if(product_ref) {
			$('li #' + product_ref).parent().parent().parent().show();
			$('li #' + product_ref).parent().show();
		}
		$('.menu li a').click(function() {
			$(this).next().slideToggle('normal');
		});
	}
	initMenu();
</script>
