<h2><?php eh($user->username) ?></h2>
<p class="alert alert-success">
	You successfully created an account.
</p>
<a href="<?php eh(url('thread/start', array('user_id' => $user->id))) ?>">
	&lArr; Back LOGIN
</a>