<h1>Registration</h1>

<?php if ($username->hasError()): ?>
    <div class="alert alert-block">
        <h4 class="alert-heading">Validation error!</h4>

        <?php if (!empty($username->validation_errors['username']['length'])): ?>
            <div><em>Your name</em> must be between
                <?php eh($username->validation['username']['length'][1]) ?> and
                <?php eh($username->validation['username']['length'][2]) ?> characters in length.
            </div>
        <?php endif ?>

        <?php if (!empty($username->validation_errors['password']['length'])): ?>
            <div><em>Your password</em> must be between
                <?php eh($username->validation['password']['length'][1]) ?> and
                <?php eh($username->validation['password']['length'][2]) ?> characters in length.
            </div>
        <?php endif ?>

    </div>
<?php endif ?>



<form class="well" method="post" action="<?php eh(url('')) ?>">
    <label>Enter Your Username &nbsp <input class="span2" type="text" name="username" value="<?php eh(Param::get('username')) ?>"/><br /></label>
    <label>Enter Your Password &nbsp&nbsp <input class="span2" type="password" name="password" value="<?php eh(Param::get('password')) ?>" /><br /></label>

    <input type="hidden" name="user_id" value="<?php eh($username->id) ?>">
    <input type="hidden" name="page_next" value="register_end">

    <button type="submit" class="btn btn-primary">REGISTER</button>
    <a class="btn btn-primary" href="<?php eh(url('thread/start')) ?>">BACK</a>
</form>