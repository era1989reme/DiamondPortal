<?php

namespace Fuel\Migrations;

class Create_quotes
{
	public function up()
	{
		\DBUtil::create_table('quotes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'leadid' => array('constraint' => 11, 'type' => 'int'),
			'jeweller_id' => array('constraint' => 11, 'type' => 'int'),
			'quote' => array('type' => 'text'),
			'files' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('quotes');
	}
}