<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return response()->json([
            'message' => 'OK',
            'data' => $todos
        ], 200);
    }
    public function store(Request $request)
    {
        $todos = new Todo();
        $todos->body = $request->body;
        $todos->save();
        return response()->json([
            'message' => 'Created successfully',
            'data' => $todos
        ], 200);
    }
    public function show(Todo $todos)
    {
        $todos = Todo::where('id', $todos->id)->first();
        if ($todos) {
            return response()->json([
                'message' => 'OK',
                'data' => $todos
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    public function destroy(Todo $todos)
    {
        $todos = Todo::where('id', $todos->id)->delete();
        if ($todos) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    public function update(Request $request, Todo $todos)
    {
        $todos = Todo::where('id', $todos->id)->first();
        $todos->name = $request->name;
        $todos->save();
        if ($todos) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
