<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
            // if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
          $employee =  Employee::all()->paginate(5);
          dd($employee);
          exit;

        // }
    }
}
