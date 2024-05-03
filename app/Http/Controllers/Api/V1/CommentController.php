<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): CommentCollection
    {
        return new CommentCollection(Comment::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentsRequest $request): CommentResource
    {
        return new CommentResource(Comment::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment): CommentResource
    {
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentsRequest $request, Comment $comment): void
    {
        $comment->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
