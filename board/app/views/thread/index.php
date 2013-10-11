<h4><p align=right>Have a Good Day,    <u><?php eh($_SESSION['name']) ?></u>  !</align></h4>




<h1><center>
MAIN PAGE <br> VIEW ALL THREADS HERE
</center></h1>

		<?php  $i = 0?>
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
<center>
<hr>
Total Number of Threads = <?php echo $i ?>


<hr>

<div class="div-pagination">
    <div class="pagerfanta">
        <?php echo $html; ?>
    </div>
</div>




<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create')) ?>">CREATE THREAD</a>
</center>


	