<?php

// validate if the username and password match the length
class Login extends AppModel
{
	public $validation = array(
		'username' => array(
		'length' => array(
		//the length of the username must be 5 characters to 18 characters
		'validate_between', 5, 18,
		),
		),
		
		'password' => array(
		'length' => array(
		//the length of the password must be 5 characters to 8 characters
		'validate_between', 5, 8,
		),
		),
	);
}