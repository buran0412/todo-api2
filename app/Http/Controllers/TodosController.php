<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return $todos;
    }
}
