<div class="users index">
<h2><?php __('Forgot Password'); ?></h2>
<?php
    echo $session->flash('auth');
    echo $form->create('User', array('action' => 'forgotpassword'));
    echo $form->input('email');
    echo $form->end('Send');
?>
</div>
<div class="actions">
</div>
