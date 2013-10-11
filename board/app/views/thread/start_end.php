<h2>HAVE A GOOD DAY  <?php eh($_SESSION['name']) ?>!</h2>

<p class="alert alert-success">
	You have successfully login your account  <u><?php echo $_SESSION['name'] ?></u> click proceed!
</p>

<a href="<?php eh(url('thread/index')) ?>">
	&rArr; PROCEED
</a>





