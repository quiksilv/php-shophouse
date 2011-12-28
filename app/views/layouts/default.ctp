<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Welcome to Joint & Y Enterprise Pte Ltd'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');
		echo $html->css('joshuaclayton-blueprint-css-016c911/blueprint/screen');
		echo $html->css('style');
		echo $html->css('/js/accordion/style');
		echo $html->css('jquery.lightbox-0.5');
		echo $javascript->link('jquery-1.3.2.min');
		echo $javascript->link('accordion/menu');
		echo $javascript->link('accordion/menu-collapsed');
		echo $javascript->link('jquery.lightbox-0.5.min');
		echo $javascript->link('jquery.editable-1.3.3.min');
		echo $javascript->link('minicart');
		echo $scripts_for_layout;
	?>
	<!--[if lt IE 8]><link rel="stylesheet" href="joshuaclayton-blueprint-css-016c911/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
	<script type="text/javascript">
	    PAYPAL.apps.MiniCart.render();
	</script>
</head>
<body>
	<div id="container" class="container">
		<div id="header"></div>

		<ul id="navbar">
			<li style="position:relative;top:14px;border:none;background:transparent;padding:0"><?php echo $html->image('leftcurve.png'); ?></li>
                        <li><?php echo $html->link('HOME', '/'); ?></li>
                        <li><?php echo $html->link('ABOUT US', '/nodes/view/aboutus'); ?></li>
                        <li><?php echo $html->link('MILITARY CATALOGUE', '/products/index/military'); ?></li>
                        <li><?php echo $html->link('CORPORATE CATALOGUE', '/products/index/corporate'); ?></li>
                        <li><?php echo $html->link('CONTACT', '/contacts/add'); ?></li>
                        <li><?php echo $html->link('SITEMAP', '#'); ?></li>
			<li style="position:relative;top:14px;border:none;background:transparent;padding:0"><?php echo $html->image('rightcurve.png'); ?></li>
		</ul>

		<div align="right">
			<?php echo $form->create('Product', array('action' => 'search') ); ?>
			<?php echo $form->text('Product.searchkey', array('style' => 'width:auto;') ); ?>
			<input type="submit" value="Search" style="margin:0.5em 0;" />
			<?php echo $form->end(); ?>
		</div>
		<div id="content" class="container">
			<div id="sidenav" class="span-5"></div>
			<div class="span-19 last">
				<?php $session->flash(); ?>
				<?php if($session->check('Auth.User.id') ) echo $this->element('admin_navbar'); ?>
				<div class="container"><?php echo $content_for_layout; ?></div>
			</div>
		</div>
		<div id="footer"></div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		var params = "<?php echo $this->params['controller']; ?>";
		if(params == 'products') {
			$('#sidenav').load('/products/sidenav');
		}
	});
</script>
</html>
