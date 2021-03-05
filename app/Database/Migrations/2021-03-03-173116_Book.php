<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
			'title' => ['type' => 'VARCHAR', 'constraint' => 255],
			'description' => ['type' => 'TEXT'],
			'author' => ['type' => 'VARCHAR', 'constraint' => 255],
			'slug' => ['type' => 'VARCHAR', 'constraint' => 255]
		]);

		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('book');
	}

	public function down()
	{
		$this->forge->dropTable('book');
	}
}
