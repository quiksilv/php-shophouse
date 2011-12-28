<h3 style="color:#a91e59;border-bottom:1px solid #5e5e5e;margin-top:20px;font-weight:bold">KINKY TIPS</h3>
<div id="blog">
<?php foreach($blogs as $blog): ?>
	<h3><?php echo $blog['Blog']['subject']; ?></h3>
	<p><?php echo $blog['Blog']['content']; ?></p>
<?php endforeach; ?>
</div>
