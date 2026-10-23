<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
class TagController extends Controller
{
    function index(){
       $tags = Tag::all();
       return View("tag.index",['tags'=>$tags, 'pageTitle'=>'tag Page']);
    }
    function create(){
        Tag::create([
        'title' => 'Software'
        ] );
        return response("Successfull Created",201);
    }

    function testManyToMany(){
        $post3 = Post::find(3);
        $post4 = Post::find(4);
        $post3->tags()->attach([1,2,3]);
        $post4->tags()->attach([3]);
         return redirect('/tags');
    }
}
