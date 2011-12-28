<!-- SWFObject embed by Geoff Stearns geoff@deconcept.com http://blog.deconcept.com/ -->
<?php echo $javascript->link('/js/flash/swfobject'); ?>
        <div id="smart-banner">
            This appears if user doesn't have JavaScript enabled, or doesn't have the required Flash Player version.
        </div>
        <script type="text/javascript">
                var so = new SWFObject("/js/flash/banner.swf", "banner", "562", "265", "8", "#000000"); 
                so.addVariable("XMLpath", "/banner.xml"); 
                //so.addParam("wmode", "opaque");
                so.write("smart-banner");
        </script>
