<h1><center>
MAIN PAGE <br> VIEW ALL THREADS HERE
</center></h1>

		<?php  $i = 0; ?>
<ul>
  <?php foreach ($threads as $v): ?>
    <li>
		<a href="<?php eh(url('thread/view', array('thread_id' => $v->id))) ?>">
		<?php eh($v->title) ?>
		<?php $i++; ?>

		</a>
    </li>
  <?php endforeach ?>
</ul>
<hr>
Total Number of Threads = <?php echo $i ?>
<hr>
<br><br>
<center>
<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create')) ?>">CREATE THREAD</a>
<a class="btn btn-large btn-primary" href="<?php eh(url('thread/start')) ?>">LOG OUT</a>
</center>

		