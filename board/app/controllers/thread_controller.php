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

$username = Param::get('username');
$password = Param::get('password');
$login = Thread::login($username, $password);

$this->set(get_defined_vars());

}







public function register()
{
$page = Param::get('page_next', 'register');

$user = new Thread;
$pass = new Thread;

switch ($page) {
case 'register':
break;

case 'register_end':
$user->username = Param::get('username');
$pass->password = Param::get('password');

try {
	$user->register($user,$pass);
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
