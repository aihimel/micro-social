<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLocations extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => 'true',
				'auto_increment' => true
			],
			'location' => [
				'type' => 'VARCHAR',
				'constraint' => 128,
				'not_null' => true
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('locations');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('locations');
	}
}
