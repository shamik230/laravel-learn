<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\Tags\Store as StoreRequest;
use App\Http\Requests\Tags\Update as UpdateRequest;

class Tags extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('title')->get();
        return view("tags.index", compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tags.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $tag = Tag::create($request->validated());
        return redirect()->route("tags.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view("tags.show", compact("tag"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view("tags.edit", compact("tag"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route("tags.show", $tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route("tags.index");
    }
}
