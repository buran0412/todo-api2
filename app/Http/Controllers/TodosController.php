<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return redirect('/');
    }
    public function store(Request $request)
    {
        $todos = new Todo();
        $todos->body = $request->body;
        $todos->save();
        return redirect('/');
    }
    public function destroy(todo $todos)
    {
        $todos->delete();
        return redirect('/');
    }
    public function edit(todo $todos)
    {
        return redirect('/');
    }
    public function update(Request $request, todo $todos)
    {
        $todos->body = $request->body;
        $todos->save();
        return redirect('/');
    }
}
