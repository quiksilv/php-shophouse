<div id="header_promotion">
	<div class="span-11">
		<img src="/themed/default/img/header_image.png" />
	</div>
	<div id="promotion" class="span-13 last"></div>
</div>
<div id="featured" class="span-18"></div>
<div id="blog" class="span-6 last"></div>
<div class="span-19"></div>

<script type="text/javascript">
$(document).ready(function() {
	$('#promotion').load('/products/promotion');
	$('#featured').load('/products/featured');
	$('#blog').load('/blogs/feed/latest');
});	
</script>
