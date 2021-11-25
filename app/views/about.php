<?php $this->layout('layout', ['title' => 'User Profile']) ?>

<h1>About page</h1>
<?php foreach($userInViews as $user):?>
<?php echo $user;?><br>
<?php endforeach;?>