<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['tags', 'comments'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('post.index', [
            'posts' => $posts,
            'pageTitle' => 'Blog Page',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        return View('Post.create', ['pageTitle' => 'Create Page', 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        // @ToDo: This will be completed in the forms section
        // print_r($request->all());
        // $validate= $request->validate([
        //     'title' => 'required|string|max:255',
        //     'body' => 'required|string',
        //     'author' => 'required|string|max:255',
        // ],[
        //     'title.required' => 'mandatory field.',
        //     'body.required' => 'mandatory field.',
        //     'author.required' => 'mandatory field.',
        // ]);
        // $data = Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'author'=> $request->author,
        //     'published' => $request->has('published') ? true : false,
        // ]);
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->has('published') ? true : false;
        $post->save();
        if ($request->has('tags')) {
            $tags = $request->input('tags');
            $post->tags()->attach($tags); // Attach selected tags
        }

        return redirect('blogs')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // @TODO: REVIEW This code to ensure it retrieves the post along with its associated tags and comments
        // And When edit show blade
        $post = Post::with(['comments', 'tags'])->findOrFail($id);
        $tags = $post->tags;

        return View('post.show', ['post' => $post, 'pageTitle' => 'Show Page', 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // @TODO: REVIEW The Comment code and make the Tag section in the edit blade to show
        //  the selected tags for the post and allow the user to select/deselect tags for the post

        $post = Post::with('tags')->findOrFail($id);
        $tags = Tag::all();

        return view('post.edit', [
            'post' => $post,
            'tags' => $tags,
            'pageTitle' => 'Edit Page',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->has('published') ? true : false;
        $post->save();
        $post->tags()->sync($request->input('tags', []));

        return redirect('blogs')->with('success', 'Post updated successfully.');

        // @TODO: REVIEW The Comment code and after the edit method is completed,
        // make sure to implement the tag syncing functionality in the update method as well, similar to how it's done in the store method.

        // $post = Post::findOrFail($id);
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->author = $request->input('author');
        // $post->published = $request->has('published');
        // $post->save();

        // // Sync tags (adds new ones, removes unchecked ones)
        // $post->tags()->sync($request->input('tags', []));

        // return redirect('blogs')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('blogs')->with('success', 'Post deleted successfully.');

        // @TODO: REVIEW The Comment code Before Delete any Post.

        // $post = Post::findOrFail($id);

        // // Detach pivot relationship records before deleting
        // $post->tags()->detach();
        // $post->delete();

        // return redirect('blogs')->with('success', 'Post deleted successfully.');
    }
}
