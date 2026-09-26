<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        // Creating the Model gives this controller access to the customers table.
        $customerModel = new CustomerModel();

        // Query Builder sorts by id, while findAll() retrieves every customer row.
        return view('customers/index', [
            'title'      => 'Customer Accounts',
            'activePage' => 'customers',
            'customers'  => $customerModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }
}
