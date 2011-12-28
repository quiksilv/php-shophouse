
<?php 
	echo $abTest->render('test-name');
?>

<div class="span-13">
	<?php echo $form->create('User', array('action' => 'register') ); ?>
	<ul>
		<li>
			<?php echo $form->label('email') . $form->text('email'); ?>
			<span class="required">* required</span>
			<div class="explanation">e.g. joe@mail.com</div>
		</li>
		<li>
			<?php echo $form->label('password') . $form->password('password'); ?>
			<span class="required">* required</span>
			<div class="explanation">at least six alphanumeric characters.</div>
		</li>
		<li>
			<?php echo $form->label('confirm') . $form->password('password2'); ?>
			<span class="required">* required</span>
			<div class="explanation">type your password again.</div>
		</li>
		<li>&nbsp;</li>
		<li>
			<?php echo $form->label('address') . $form->text('address1'); ?>
			<div class="explanation">e.g. 15 pineapple road</div>
		</li>
		<li>
			<?php echo $form->label('postcode') . $form->text('zip'); ?>
			<div class="explanation">e.g. 155647</div>
		</li>
		<li>
			<?php echo $form->label('phone') . $form->text('night_phone_a'); ?>
			<div class="explanation">e.g. 98765432</div>
		</li>
		<li><input type="submit" value="Register"></li>
	</ul>
	<?php echo $form->end(); ?>
</div>

<div class="span-11 last">
	<h2>Register with SexShopSg!<h2>
	<h3>This is a catchphrase for you to fill in!</h3>
	<p>Write something here to encourage people to register.</p>
</div>
