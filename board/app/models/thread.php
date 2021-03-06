<?php
class Thread extends AppModel
{
    public $validation = array(
        'title' => array(
            'length' => array(
                'validate_between', 1, 30,
            ),
        ),
    );

   //model for getting all the threads for viewing
	public static function getAll()
	{
		$threads = array();
		$db = DB::conn();
		$rows = $db->rows('SELECT * FROM thread');
			foreach ($rows as $row) {
				$threads[] = new Thread($row);
			} 
		return $threads;
	}

    //model for getting the threadID
	public static function get($id)
	{
		$db = DB::conn();
		$row = $db->row('SELECT * FROM thread WHERE id = ?', array($id));
		return new self($row);
	}

    //model for getting the comments in a thread
	public function getComments()
	{
		$comments = array();
		$db = DB::conn();
		$rows = $db->rows(
			'SELECT * FROM comment WHERE thread_id = ? ORDER BY created ASC',
			array($this->id)
		);
			foreach ($rows as $row) {
				$comments[] = new Comment($row);
			}
	return $comments;
	}

   //model for writing the comments
	public function write(Comment $comment)
	{
		if (!$comment->validate()) {
		throw new ValidationException('invalid comment');
		}

	$db = DB::conn();
	$db->query(
		'INSERT INTO comment SET thread_id = ?, username = ?, body = ?, created = NOW()',
		array($this->id, $comment->username, $comment->body)
	);
	}

   //model for creating threads
	public function create(Comment $comment)
	{
		$this->validate();
		$comment->validate();
			
			if ($this->hasError() || $comment->hasError()) {
				throw new ValidationException('invalid thread or comment');
			}
			
		$db = DB::conn();
		$db->begin();
		$db->query('INSERT INTO thread SET title = ?, created = NOW()', array($this->title));
		$this->id = $db->lastInsertId();

		// write first comment at the same time
		$this->write($comment);
		$db->commit();
	}

	
	//model for the login page or start page
	public static function login($user,$pass){

        if (!$user->validate()) {
            throw new ValidationException('invalid information');
        }

        $db=DB::conn();
        $checking = $db->row("SELECT * FROM information WHERE username = ? && password = ?" , array($user->username, $pass->password));
        if(($checking)!=0){
            return $page ='start_end';
        }
        var_dump($checking);

	}

 
	//model for register page
	public static function register($user,$pass)
	{

        if (!$user->validate()) {
            throw new ValidationException('invalid information');
        }

        $db = DB::conn();
        $db->begin();
        $db->query("INSERT INTO information SET username = ?, password = ? " , array($user->username, $pass->password));



	}
	
	
	//model for converting the objects to array to paginate
    public static function objectToarray($data)
    {
        try{
            if (is_array($data) || is_object($data)){
                $result = array();
                foreach ($data as $key => $value){
                    $result[$key] = $value;
                }
                return $result;
            }
            return $data;
        } catch(ErrorException $e) {
            return "error ";
        }
    }

}
