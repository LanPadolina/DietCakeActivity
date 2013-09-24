<h4><p align=right>Have a Good Day, <u><?php echo $username ?></u> !
<a class="btn btn-small btn-primary" href="<?php eh(url('thread/start')) ?>">LOG OUT</a></align></h4>


<h1><center>
MAIN PAGE <br> VIEW ALL THREADS HERE
</center></h1>

		<?php  $i = 0; ?>
<ul>
  <?php foreach ($threads as $v): ?>
    <li>
		<a href="<?php eh(url('thread/view', array('thread_id' => $v->id,'name'=>$username))) ?>">
		<?php eh($v->title) ?>
		<?php $i++; ?>

		</a>
    </li>
  <?php endforeach ?>
</ul>

<hr>
Total Number of Threads = <?php echo $i ?>
<?phpecho $username ?>
<hr>


<center>
<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create', array('name'=>$username))) ?>">CREATE THREAD</a>
</center>

		