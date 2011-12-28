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
		<?php __('Sex Shop SG'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');
		echo $html->css('joshuaclayton-blueprint-css-016c911/blueprint/screen');
		echo $html->css('style');
		echo $html->css('login');
		echo $html->css('/js/accordion/style');
		echo $html->css('jquery.lightbox-0.5');
		echo $javascript->link('jquery-1.3.2.min');
		echo $javascript->link('login');
		echo $javascript->link('accordion/menu');
		echo $javascript->link('accordion/menu-collapsed');
		echo $javascript->link('jquery.lightbox-0.5.min');
		echo $javascript->link('jquery.editable-1.3.3');
		echo $scripts_for_layout;
	?>
	<!--[if lt IE 8]><link rel="stylesheet" href="joshuaclayton-blueprint-css-016c911/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->

</head>
<body>
	<div id="container" class="container">
		<div id="header" class="span-11"></div>
		<div id="homepagecontact" class="span-6 append-7 last">
			<p>☎ Call us: +65 9876 5432 Mon-Sun 10am - 8pm SGT</p>
		</div>
		<div class="span-20">
			<ul id="navbar">
				<li><?php echo $html->link('HOME', '/'); ?></li>
				<li><?php echo $html->link('FOR HIM', '/products/index/him'); ?></li>
				<li><?php echo $html->link('FOR HER', '/products/index/her'); ?></li>
				<li><?php echo $html->link('FOR COUPLES', '/products/index/couples'); ?></li>
				<li><?php echo $html->link('ABOUT', '/nodes/view/aboutus'); ?></li>
				<li><?php echo $html->link('FAQs', '/nodes/view/faq'); ?></li>
				<li><?php echo $html->link('CONTACT', '/contacts/add'); ?></li>
			</ul>
		</div>
		<div id="signup" class="span-4 last">
			<div id="login_container">
				<?php 
					if($session->check('Auth.User.id') ) {
				?>
					<div id="topnav" class="topnav"><a href="login" class="signin"><span><?php echo $session->read('Auth.User.email'); ?></span></a> </div>
					<fieldset id="signin_menu">
					<?php
					    echo $html->link('logout', array('controller' => 'users', 'action' => 'logout') );
					?>
					</fieldset>
				<?php
					} else {
				?>
					<div id="topnav" class="topnav">
						<?php echo $html->link('Register', array('controller' => 'users', 'action' => 'register') ); ?> 
						<a href="login" class="signin"><span>Sign in</span></a> </div>
					<fieldset id="signin_menu">
					<?php
					    echo $form->create('User', array('action' => 'login'));
					    echo $form->input('email');
					    echo $form->input('password');
					?>
					<p class="remember">
						<!--input id="signin_submit" value="Sign in" tabindex="6" type="submit"-->
						<?php
							echo $form->checkbox('remember_me');
							echo $form->label('remember_me');
							echo $form->end('Login');
						?>
					</p>
					<p class="forgot"> <a href="/users/forgotpassword" id="resend_password_link">Forgot your password?</a> </p>
					</fieldset>
				<?php } ?>
			</div>
		</div>
		<div align="right">
			<?php echo $form->create('Product', array('action' => 'search') ); ?>
			<?php echo $form->text('Product.searchkey', array('style' => 'width:auto;') ); ?>
			<input type="submit" value="Search" style="margin:0.7em 0;" />
			<?php echo $form->end(); ?>
		</div>
		<div id="content" class="container">
			<?php echo $session->flash(); ?>
			<?php if($session->check('Auth.User.id') ) echo $this->element('admin_navbar'); ?>
			<div class="container"><?php echo $content_for_layout; ?></div>
		</div>
		<div id="footer">
			<ul>
				<li><?php echo $html->link('HOME', '/'); ?></li>
				<li><?php echo $html->link('FOR HIM', '/products/index/him'); ?></li>
				<li><?php echo $html->link('FOR HER', '/products/index/her'); ?></li>
				<li><?php echo $html->link('FOR COUPLES', '/products/index/couples'); ?></li>
				<li><?php echo $html->link('ABOUT', '/nodes/view/aboutus'); ?></li>
				<li><?php echo $html->link('FAQs', '/nodes/view/faq'); ?></li>
				<li><?php echo $html->link('CONTACT', '/contacts/add'); ?></li>
			</ul>
		</div>
	</div>
	<script src="/themed/default/js/minicart.js" type="text/javascript"></script>
	<script type="text/javascript">
	    PAYPAL.apps.MiniCart.render();
	</script>
</body>
</script>
</html>
