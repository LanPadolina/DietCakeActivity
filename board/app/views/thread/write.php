<h2><?php eh($thread->title) ?></h2>
	
	<?php if ($comment->hasError()): ?>
		<div class="alert alert-block">
			<h4 class="alert-heading">Validation error!</h4>
				
				<?php if (!empty($comment->validation_errors['body']['length'])): ?>
					<div><em>Comment</em> must be between
						<?php eh($comment->validation['body']['length'][1]) ?> and
						<?php eh($comment->validation['body']['length'][2]) ?> characters in length.
					</div>
				<?php endif ?>
		</div>
	<?php endif ?>

	
<form class="well" method="post" action="<?php eh(url('thread/write',array('name'=>$username))) ?>">
	<label>Comment</label>
	<textarea name="body"><?php eh(Param::get('body')) ?></textarea>
	<br />
	
	<input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>">
	<input type="hidden" name="page_next" value="write_end">
	
	<button type="submit" class="btn btn-primary">SUBMIT</button>
	<a class="btn btn-primary" href="<?php eh(url('thread/index', array('name'=>$username))) ?>">HOME</a>
</form>