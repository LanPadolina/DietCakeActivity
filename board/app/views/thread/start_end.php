<h2>HAVE A GOOD DAY "<?php echo($username) ?>"!</h2>

<p class="alert alert-success">
	You have successfully login your account <?php echo $username?> click proceed!
</p>

<a href="<?php eh(url('thread/index', array('name'=>$username))) ?>">
	&rArr; PROCEED
</a>





