<?php

// php spark make:migration AddFirstNameToUsersTable
// php spark migrate

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFirstNameToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("users", [
            "first_name" => [
                "type"       => "VARCHAR",
                "constraint" => 64,
                "null"       => false
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn("users", "first_name");
    }
}
