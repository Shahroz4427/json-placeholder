<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodosRequest;
use App\Http\Requests\UpdateTodosRequest;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): TodoCollection
    {
        return new TodoCollection(Todo::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodosRequest $request): TodoResource
    {
        return new TodoResource(Todo::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo): TodoResource
    {
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodosRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    }
}
