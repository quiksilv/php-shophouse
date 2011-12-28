<banners>
<?php foreach($banners as $banner): ?>
        <banner>
                <source><?php echo DS . "flash" . DS . htmlentities($banner['Slide']['name']); ?></source>
                <link>http://jyent.com.sg</link>
                <timedelay>4</timedelay>
        </banner>
<?php endforeach; ?>
</banners>
