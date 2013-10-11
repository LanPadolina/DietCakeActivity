<h2><?php eh($thread->title) ?></h2>

<p class="alert alert-success">
	You successfully created a thread <u><?php eh($_SESSION['name']) ?></u>.
</p>

<a href="<?php eh(url('thread/view', array('thread_id' => $thread->id,'name'=>$username))) ?>">
	&larr; Go to thread
</a>