<?php
session_start();
class ThreadController extends AppController
{
	//controller for the main page that has pagination for threads
    public function index()
    {
        $threads = Thread::getAll();

        $adapter = new \Pagerfanta\Adapter\ArrayAdapter($threads);
        $paginator = new \Pagerfanta\Pagerfanta($adapter);
        $paginator->setMaxPerPage(8);
        $paginator->setCurrentPage(Param::get('page', 1));
        $threads = Thread::objectToarray($paginator);

        $view = new \Pagerfanta\View\DefaultView();
        $options = array(
            'previous_message'=>'← PREVIOUS ',
            'next_message'=> ' NEXT PAGE →'
        );

        $html = $view->render($paginator,'routeGenerator', $options);

        $this->set(get_defined_vars());
    }

 	//controller for viewing comments in a a thread
	public function view()
	{

		$username = Param::get('name');
		$thread = Thread::get(Param::get('thread_id'));
		$comments = $thread->getComments();
		$this->set(get_defined_vars());
	}

	//controller for writing comments
	public function write()
	{

		$username = Param::get('name');
		$thread = Thread::get(Param::get('thread_id'));
		$comment = new Comment;
		$page = Param::get('page_next', 'write');
	
			switch ($page) {
				case 'write':
				break;
				case 'write_end':
					$comment->username = $_SESSION['name'];
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

	// Controller for create threads
	public function create()
	{
		$username = Param::get('name');
		$thread = new Thread;
		$comment = new Comment;
		$page = Param::get('page_next', 'create');
			
			switch ($page) {
				case 'create':
				break;	
				case 'create_end':
					$thread->title = Param::get('title');
					$comment->username = $_SESSION['name'];
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
	
	
		//controller for the start page or the login page
	public function start()
    {

        $username =  $_SESSION['name']= Param::get('username');
        $thread = new Thread;
        $logininfo = new Login;
        $page = Param::get('page_next', 'start');

        switch ($page) {
            case 'start':
                break;
            case 'start_end':
                $logininfo->username = Param::get('username');
                $logininfo->password = Param::get('password');
                try {
                    $thread->login($logininfo,$logininfo);
                } catch (ValidationException $e) {
                    $page ='start';
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }

        $this->set(get_defined_vars());
        $this->render($page);
    }


	//controller for the register page
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
}