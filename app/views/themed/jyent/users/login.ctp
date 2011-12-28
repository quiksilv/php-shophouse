<h2>Admin Panel</h2>
<p>Hi Guest, please log in:</p>
<?php
    $session->flash('auth');
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username');
    echo $form->input('password');
    echo $form->end('Login');
?>
