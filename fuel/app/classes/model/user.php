<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
		'credit',
		'name',				'website',				'phone',				'address'		
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'users';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		if($factory=='credit_add') {
			$val->add_field('credit', 'Credit', 'required|numeric_min[0]');
		} elseif($factory=='email') {
			$val->add_callable(new MyRules());
			$val->add_field	('email', 'Email', 'required|valid_email|max_length[255]')->add_rule('unique', 'users.email');
		} elseif($factory=='password') {
			$val->add_field('password', 'Password', 'required|min_length[3]|max_length[255]');
		} else {
		$val->add_callable(new MyRules());
		$val->add_field('name', 'Name', 'required|min_length[3]|max_length[255]');
		$val->add_field('username', 'Username', 'required|min_length[3]|max_length[255]')->add_rule('unique', 'users.username');
		$val->add_field('password', 'Password', 'required|min_length[3]|max_length[255]');
		$val->add_field	('email', 'Email', 'required|valid_email|max_length[255]')->add_rule('unique', 'users.email');
		}
		return $val;
	}

}
