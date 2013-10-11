<h1>Login Information</h1>


<?php if ($logininfo->hasError()): ?>
    <div class="alert alert-block">
        <h4 class="alert-heading">Login Failed Please Try Again!</h4>

        <?php if (!empty($logininfo->validation_errors['username']['length'])): ?>
            <div><em>Your name</em> do not have any match.</div>
        <?php endif ?>

        <?php if (!empty($logininfo->validation_errors['password']['length'])): ?>
            <div><em>Your password</em> do not have any match.</div>
        <?php endif ?>

    </div>
<?php endif ?>





<form class="well" method="post" action="">
    <label>Enter Your Username &nbsp <input class="span2" type="text" name="username" value="<?php eh(Param::get('username')) ?>"/><br /></label>
    <label>Enter Your Password &nbsp&nbsp <input class="span2" type="password" name="password" value="<?php eh(Param::get('password')) ?>" /><br /></label>

    <input type="hidden" name="user_id" value="<?php eh($username->id) ?>">
    <input type="hidden" name="page_next" value="start_end">

    <button type="submit" class="btn btn-primary">LOGIN</button>
    <a class="btn btn-primary" href="<?php eh(url('thread/register')) ?>">NEW</a>
</form>
