<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    function index(){
       $posts = Post::all();
       return View("post.index",['posts'=>$posts, 'pageTitle'=>'Blog Page']);
    }
    function create(){
        Post::create([
        'title' => 'my first Post' ,
        'body' => 'this is my content',
        'author' => 'Hassan Koraim',
        'published' => true
        ] );
        return redirect('/blog');

    }
}
