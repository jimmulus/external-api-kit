<?php

namespace App\Http\Controllers;

use App\Services\Api\DataApi;
use App\Models\Post;
use App\Enums\CategoryEnum;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class DummyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DataApi $dataApi)
    {
        $limit = request('limit', false);
        $search = request('search', false);
        $skip = request('skip', false);
        return $dataApi->getData(CategoryEnum::tryFrom('posts'), search: $search, limit: $limit, skip: $skip);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
