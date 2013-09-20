<?php
class Login extends AppModel
{
public $validation = array(
'username' => array(
'length' => array(
'validate_between', 5, 21,
),
),
'password' => array(
'length' => array(
'validate_between', 5, 8,
),
),
);
}