<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
            // if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
          $employee =  Employee::paginate(10);
             return $employee;

        // }
    }
}
