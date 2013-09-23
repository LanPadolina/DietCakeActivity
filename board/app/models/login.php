<?php

// validate if the username and password match the length
class Login extends AppModel
{
public $validation = array(
'username' => array(
'length' => array(
'validate_between', 5, 18,
),
),
'password' => array(
'length' => array(
'validate_between', 5, 8,
),
),
);
}