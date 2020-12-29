<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
	public function up()
	{

		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'full_name' => [
				'type' => 'VARCHAR',
				'constraint' => 128,
				'not_null' => true
			],
			'location' => [
				'type' => 'TEXT',
				'not_null' => true
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 128,
				'not_null' => true
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 128,
				'not_null' => true,
			],
			'is_admin' => [
				'type' => 'BOOL',
				'not_null' => true,
				'default' => false
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
