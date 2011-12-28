<!-- SWFObject embed by Geoff Stearns geoff@deconcept.com http://blog.deconcept.com/ -->
<?php echo $javascript->link('flash/swfobject.js'); ?>
<div class="span-16">
	<div id="smart-banner">
	    This appears if user doesn't have JavaScript enabled, or doesn't have the required Flash Player version.
	</div>
	<script type="text/javascript">
		var so = new SWFObject("js/flash/banner.swf", "myMovie", "562", "265", "8", "#000000"); 
		so.addVariable("XMLpath", "js/flash/banner.xml"); 
		//so.addParam("wmode", "opaque");
		so.write("smart-banner");
	</script>
</div>
	<div class="span-6">
	<strong>01 June 2010</strong><br>
	Please pardon with us as we are still constructing our catalogue pages.
	Meanwhile, please <?php echo $html->link('contact us', '/contacts/add'); ?> if you have any enquiry!
</div>
