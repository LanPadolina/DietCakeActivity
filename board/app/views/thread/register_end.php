<h2><?php eh($username->username) ?></h2>

<p class="alert alert-success">
	You successfully created an account.
</p>

<a href="<?php eh(url('thread/start', array($username))) ?>">
	&lArr; Back LOGIN
</a>