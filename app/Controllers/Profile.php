<?php
namespace App\Controllers;
use App\Models\TaskUserModel;
class Profile extends BaseController {
    public function index(): string {
        return view('pages/profile', ['title' => 'Profile', 'activePage' => 'profile', 'user' => (new TaskUserModel())->first()]);
    }
}
