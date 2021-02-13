<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{

    public function index()
    {
        $item = Todo::all();
        return response()->json([
            'message' => 'OK',
            'data' => $item
        ], 200);
    }
    public function store(Request $request)
    {
        $item = new Todo();
        $item->body = $request->body;
        $item->save();
        return response()->json([
            'message' => 'Created successfully',
            'data' => $item
        ], 200);
    }
    public function show(Todo $todos)
    {
        $item = Todo::where('id', $todos->id)->first();
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
    public function update(Request $request, Todo $todos)
    {
        $item = Todo::where('id', $todos->id)->update($todos);
        return redirect('/');
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
    public function destroy(Todo $todos)
    {
        $item = Todo::where('id', $todos->id)->delete();
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
