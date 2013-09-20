<?php
class ThreadController extends AppController
{


public function index()
{
// TODO: Get all threads
$threads = Thread::getAll();
$this->set(get_defined_vars());
}



public function create()
{
$thread = new Thread;
$comment = new Comment;
$page = Param::get('page_next', 'create');
switch ($page) {
case 'create':
break;
case 'create_end':
$thread->title = Param::get('title');
$comment->username = Param::get('username');
$comment->body = Param::get('body');
try {
$thread->create($comment);
} catch (ValidationException $e) {
$page = 'create';
}
break;
default:
throw new NotFoundException("{$page} is not found");
break;
}
$this->set(get_defined_vars());
$this->render($page);
}




public function write()
{
$thread = Thread::get(Param::get('thread_id'));
$comment = new Comment;
$page = Param::get('page_next', 'write');
switch ($page) {
case 'write':
break;
case 'write_end':
$comment->username = Param::get('username');
$comment->body = Param::get('body');
try {
$thread->write($comment);
} catch (ValidationException $e) {
$page = 'write';
}
break;
default:
throw new NotFoundException("{$page} is not found");
break;
}

$this->set(get_defined_vars());
$this->render($page);
}




public function view()
{
$thread = Thread::get(Param::get('thread_id'));
$comments = $thread->getComments();
$this->set(get_defined_vars());
}












public function start()
{

$name = Param::get('username');
$word = Param::get('password');
$login = Thread::login($name, $word);

$this->set(get_defined_vars());

}







public function register()
{

$thread = new Thread;
$username = new Login;

$page = Param::get('page_next', 'register');

switch ($page) {
case 'register':
break;

case 'register_end':
	$username->username = Param::get('username');
	$username->password = Param::get('password');

try {
		$thread->register($username,$username);
	} catch (ValidationException $e) {
		$page ='register';
	}
break;


default:
	throw new NotFoundException("{$page} is not found");
	break;
}
            $this->set(get_defined_vars());
			$this->render($page);
}






























public function starting()
{
            $this->set(get_defined_vars());
}

public function start_end()
{
			$username = Param::get('username');

            $this->set(get_defined_vars());
}

}
