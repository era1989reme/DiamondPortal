<?php

class Model_Diamondfinder extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'rings',
		'budget',
		'ringsize',
		'ringshape',
		'postcode',
		'otherinfo',
		'email',
		'created_at',
		'updated_at',
		'status',
		'amount'
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

	protected static $_table_name = 'diamondfinder';
}
