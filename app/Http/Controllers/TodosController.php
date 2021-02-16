<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{

    public function index()
    {
        $items = Todo::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }
    public function store(Request $request)
    {
        $item= new Todo();
        $item->text = $request->text;
        $item->save();
        return response()->json([
            'message' => 'Created successfully',
            'data' => $item
        ], 200);
    }
    public function show(Todo $todo)
    {
        $item = Todo::where('id', $todo->id)->first();
        if ($item) {
            return response()->json([
                'message' => 'OK',
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    public function update(Request $request, Todo $todo)
    {
        $item = Todo::where('id', $todo->id)->first();
        $item->text = $request->text;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    public function destroy(Todo $todo)
    {
        $item = Todo::where('id', $todo->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}

