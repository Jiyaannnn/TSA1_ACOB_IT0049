<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use DateTimeImmutable;
class TaskSystemSeeder extends Seeder {
    protected $DBGroup = 'taskStore';
    public function run(): void {
        $today = new DateTimeImmutable('today');
        $createdAt = (new DateTimeImmutable())->format('Y-m-d H:i:s');
        $entries = [
            ['Sanitize the refill dispensers', 'completed', 0],
            ['Check bulk soap and detergent levels', 'pending', 0],
            ['Prepare customer refill orders', 'in progress', 0],
            ['Record returned containers', 'pending', 0],
            ['Calibrate counter scales', 'completed', -1],
            ['Reconcile refill sales', 'completed', -1],
            ['Receive new cleaning concentrate', 'pending', 1],
            ['Print batch and expiry labels', 'pending', 1],
            ['Review container reuse totals', 'pending', 2],
        ];
        $tasks = [];
        // Relative dates ensure the Welcome page has records when seeded.
        foreach ($entries as [$title, $status, $offset]) {
            $tasks[] = ['title' => $title, 'status' => $status,
                'task_date' => $today->modify(sprintf('%+d day', $offset))->format('Y-m-d'),
                'created_at' => $createdAt];
        }
        $this->db->table('tasks')->insertBatch($tasks);
        // The assessment requires exactly one demo user.
        $this->db->table('users')->insert(['username' => 'mara', 'full_name' => 'Mara Santos',
            'email' => 'mara@example.com', 'created_at' => $createdAt]);
    }
}
