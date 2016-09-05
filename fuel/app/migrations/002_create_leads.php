<?php

namespace Fuel\Migrations;

class Create_leads
{
	public function up()
	{
		\DBUtil::create_table('leads', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'ring_type' => array('constraint' => 255, 'type' => 'varchar'),
			'budget' => array('type' => 'double'),
			'post_code' => array('constraint' => 10, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('leads');
	}
}
