<?php
namespace App\Models;
use CodeIgniter\Model;
class TaskModel extends Model {
    protected $DBGroup = 'taskStore';
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];
    public function forDate(string $date): array {
        // Filter in SQL so other dates never reach the Welcome view.
        return $this->where('task_date', $date)->orderBy('id', 'ASC')->findAll();
    }
    public function allByDate(): array {
        return $this->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll();
    }
}
