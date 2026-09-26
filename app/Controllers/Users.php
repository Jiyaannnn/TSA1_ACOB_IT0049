<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        // The UserModel replaces the static user array used in TFA1.
        $userModel = new UserModel();

        // Query Builder retrieves the users in a stable order before rendering.
        return view('users/index', [
            'title'      => 'User Accounts',
            'activePage' => 'users',
            'users'      => $userModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }
}
