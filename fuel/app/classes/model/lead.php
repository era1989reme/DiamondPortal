<?php
class Model_Lead extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'ring_type',
		'budget',
		'post_code',
		'email',
		'description',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('ring_type', 'Ring Type', 'required|max_length[255]');
		$val->add_field('budget', 'Budget', 'required');
		$val->add_field('post_code', 'Post Code', 'required|max_length[10]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('description', 'Description', 'required');

		return $val;
	}

}
