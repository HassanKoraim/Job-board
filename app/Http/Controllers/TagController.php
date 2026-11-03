<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // @TODO: REVIEW The Comment code.
    // $tags = Tag::all();
    // $tags = Tag::all();
    // return view('post.create', [
    //     'pageTitle' => 'Create Post',
    //     'tags' => $tags
    // ]);
    //    return View("tag.index",['tags'=>$tags, 'pageTitle'=>'tag Page']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Tag::factory(10)->create();
        return response("Tags created successfully.",201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
