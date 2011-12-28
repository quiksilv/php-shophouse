<?php 
	if($this->params['pass'][0] == 'home') {
		echo $this->element('gallery'); 
	}
?>
<?php echo $node['Node']['content']; ?>
