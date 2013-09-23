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






//model for getting the
	public static function get($id)
	{
	$db = DB::conn();
	$row = $db->row('SELECT * FROM thread WHERE id = ?', array($id));
	return new self($row);
	}

	
	
	
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



//model for the login page or start page
public static function login($username, $password){
		
				
		$login = "";
		$db = DB::conn();
		$check = $db->query("SELECT * FROM information WHERE username = '$username'  AND password = '$password' ");


		if($db->rowCount($check) != 0){
			return $login=url('thread/start_end', array($username));

			}else{
			return $login=url('thread/start');
			//print "error";
		}
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
$db->commit();
}

	
	
	
		
	
	

	
}