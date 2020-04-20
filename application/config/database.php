<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($_SERVER['HTTP_HOST']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='localhost') {
	$password='123456';
	$db_name='payroll_new';
}
else{
	$password='Tata123#@!';
	$db_name='payroll_new';
}
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => $password,
	'database' => $db_name,
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
