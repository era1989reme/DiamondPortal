<?php

namespace Fuel\Migrations;

class Create_diamondfinders
{
	public function up()
	{
		\DBUtil::create_table('diamondfinders', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'rings' => array('type' => 'text'),
			'budget' => array('constraint' => 20, 'type' => 'varchar'),
			'rigsize' => array('constraint' => 30, 'type' => 'varchar'),
			'righshape' => array('constraint' => 30, 'type' => 'varchar'),
			'postcode' => array('constraint' => 10, 'type' => 'varchar'),
			'otherinfo' => array('type' => 'text'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'status'		=> array('type'=> "ENUM(  '0',  '1' )", 'default'=>'0'),
			'amount'		=> array('constraint'=>'10,2', 'type'=>'double', 'default'=>0)
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('diamondfinders');
	}
}
