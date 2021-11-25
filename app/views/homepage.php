<?php $this->layout('layout', ['title' => 'User Profile']) ?>

<h1>User Profile</h1>

<?php foreach($postsInViews as $posts):?>
<?php echo $posts['title'];?><br>
<?php endforeach;?>
