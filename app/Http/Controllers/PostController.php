<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all posts from the database
       $posts = Post::orderBy("created_at","desc")->paginate(10);
       return View("post.index",['posts'=>$posts, 'pageTitle'=>'Blog Page']);
        
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
    public function store(Request $request)
    {
        // @ToDo: This will be completed in the forms section
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $post = Post::findOrFail($id);
        $tags = $post->tags;
        return View('post.show',['post'=>$post, 'pageTitle' => 'Show Page', 'tags' => $tags ]);
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
