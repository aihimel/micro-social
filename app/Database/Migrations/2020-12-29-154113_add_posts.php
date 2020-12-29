<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPosts extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'user_id' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'location_id' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 128,
			],
			'status' => [
				'type' => 'TEXT',
				'not_null' => true,
			],
			'comment' => [
				'type' => 'JSON'
			],
			'insertion_datetime' => [
				'type' => 'TIMESTAMP'
			],
			'updated' => [
				'type' => 'TIMESTAMP'
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('posts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
