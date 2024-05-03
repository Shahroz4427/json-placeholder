<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumsRequest;
use App\Http\Requests\UpdateAlbumsRequest;
use App\Http\Resources\AlbumCollection;
use App\Http\Resources\AlbumResource;
use App\Models\Album;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AlbumCollection
    {
        return new AlbumCollection(Album::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumsRequest $request): AlbumResource
    {
        return new AlbumResource(Album::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album): AlbumResource
    {
        return new AlbumResource($album);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumsRequest $request, Album $album)
    {
        $album->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
    }
}
