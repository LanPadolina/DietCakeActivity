<h1><?php eh($thread->title) ?></h1>
<?php $i = 0; ?>
<?php foreach ($comments as $k => $v): ?>
<div class="comment">
	<div class="meta">
		<?php eh($k + 1) ?>: <?php eh($v->username) ?> <?php eh($v->created) ?>
	</div>
	<div>
		<?php echo readable_text($v->body) ?>
		<?php $i++; ?>
	</div>
</div>
<?php endforeach ?>
<hr>
Total Number of Comments = <?php echo $i ?>

<hr>

<form class="well" method="post" action="<?php eh(url('thread/write')) ?>">
	<label>Your name</label>
	<input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
	<label>Comment</label>
	<textarea name="body"><?php eh(Param::get('body')) ?></textarea>
	<br />
	<input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>">
	<input type="hidden" name="page_next" value="write_end">
	<button type="submit" class="btn btn-primary">SUBMIT</button>
	<a class="btn btn-primary" href="<?php eh(url('thread/index')) ?>">HOME</a>
	</form>


