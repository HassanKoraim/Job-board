<?php

namespace App\Http\Controllers;

use App\Models\Post;
class PostController extends Controller
{
    function index(){
     //  $posts = Post::cursorPaginate('5');
       $posts = Post::orderBy("created_at","desc")->paginate(10);
       return View("post.index",['posts'=>$posts, 'pageTitle'=>'Blog Page']);
    }
    public function create(){
      Post::factory(10)->create();
       // return redirect('/blog');
       return response("Successfull Creation", 201);
    }
    function show($id){
        $post = Post::findOrFail($id);
        $tags = $post->tags;
        return View('post.show',['post'=>$post, 'pageTitle' => 'Show Page', 'tags' => $tags ]);
    }
    function delete($id){
        Post::destroy($id);
       // return redirect('/blog');
       return response("Successfull Deleted", 204);
    }
}
