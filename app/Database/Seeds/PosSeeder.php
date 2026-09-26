<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run(): void
    {
        // One shared timestamp keeps the demonstration records consistent.
        $createdAt = '2026-09-24 08:00:00';

        // insertBatch() efficiently writes all five customer arrays to MySQL.
        $this->db->table('customers')->insertBatch([
            ['full_name' => 'Angelo Pineda', 'email' => 'anpineda@fit.edu.ph', 'phone' => '09074144816', 'created_at' => $createdAt],
            ['full_name' => 'Richmon Miguel', 'email' => 'rbmiguel@fit.edu.ph', 'phone' => '09927918909', 'created_at' => $createdAt],
            ['full_name' => 'Howard Callanta', 'email' => 'hmcallanta@fit.edu.ph', 'phone' => '09084589753', 'created_at' => $createdAt],
            ['full_name' => 'Gerard Doroja', 'email' => 'gbdoroja@fit.edu.ph', 'phone' => '09615331576', 'created_at' => $createdAt],
            ['full_name' => 'Tristan Cachapero', 'email' => 'tbcachapero@fit.edu.ph', 'phone' => '09760997496', 'created_at' => $createdAt],
        ]);

        // A second batch inserts the five records that replace TFA1's user array.
        $this->db->table('users')->insertBatch([
            ['username' => 'jacob', 'full_name' => 'Jian Acob', 'created_at' => $createdAt],
            ['username' => 'ivicencio', 'full_name' => 'Isaiah Vicencio', 'created_at' => $createdAt],
            ['username' => 'abarcelona', 'full_name' => 'Aaron Barcelona', 'created_at' => $createdAt],
            ['username' => 'ajamito', 'full_name' => 'Amiel Jamito', 'created_at' => $createdAt],
            ['username' => 'smacaldo', 'full_name' => 'Sean Macaldo', 'created_at' => $createdAt],
        ]);
    }
}
