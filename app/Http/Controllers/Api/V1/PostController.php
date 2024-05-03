<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use App\Http\Requests\UpdatePostsRequest;
use App\Http\Requests\StorePostsRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): PostCollection
    {
        return new PostCollection(Post::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostsRequest $request): PostResource
    {
        return new PostResource(Post::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {
       $post->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
