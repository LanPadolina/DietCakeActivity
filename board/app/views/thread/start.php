<h1>Login Information</h1>





<form class="well" method="post" action="<?php eh($login); ?>">
   <label>Enter Your Username &nbsp <input class="span2" type="text" name="username" value="<?php eh(Param::get('username')) ?>"/><br /></label> 
    <label>Enter Your Password &nbsp&nbsp <input class="span2" type="password" name="password" value="<?php eh(Param::get('password')) ?>" /><br /></label> 
	
	<input type="hidden" name="user_id" value="<?php eh($username->id) ?>">
	
    <button type="submit" class="btn btn-primary">LOGIN</button>
	<a class="btn btn-primary" href="<?php eh(url('thread/register')) ?>">NEW</a>
</form>


