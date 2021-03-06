<?php

class Model_History extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'type',
		'messge',
		'balance',
		'created_at',
		'updated_at',
		'jeweller_id'
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

	protected static $_table_name = 'histories';

}
