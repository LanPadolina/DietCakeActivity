<h1>Login Information</h1>

<?php





?>

<form class="well" method="post" action="<?php echo eh($login); ?>">
		<label>Enter Your Username &nbsp 
		<input type="text" name="username" value="<?php eh(Param::get('username'))?>" />
   <br /></label> 
		<label>Enter Your Password &nbsp&nbsp
		<input type="text" name="password" value="<?php eh(Param::get('password'))?>" /><br /></label> 
	
	<input type="hidden" name="user_id" value="<?php eh($thread->id) ?>">
	<input type="hidden" name="page_next" value="starting">
		
   <button type="submit" class="btn btn-primary">LOGIN</button>
  <a class="btn btn-primary" href="<?php eh(url('thread/register')) ?>">REGISTER</a>
</form>
