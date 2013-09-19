<h1>Registration</h1>







<form class="well" method="post" action="<?php eh(url('')) ?>">
   <label>Enter Your Username &nbsp <input class="span2" type="text" name="username" value="<?php eh(Param::get('username')) ?>"/><br /></label> 
    <label>Enter Your Password &nbsp&nbsp <input class="span2" type="password" name="password" value="<?php eh(Param::get('password')) ?>" /><br /></label> 
	<input type="hidden" name="page_next" value="register_end">
   <button type="submit" class="btn btn-primary">REGISTER</button>
  <a class="btn btn-primary" href="<?php eh(url('thread/start')) ?>">BACK</a>
</form>
