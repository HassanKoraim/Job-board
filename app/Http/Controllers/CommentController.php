<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
class CommentController extends Controller
{
    function index(){
       $comments = Comment::paginate(5);
       return View("comment.index",['comments'=>$comments, 'pageTitle'=>'Blog Page']);
    }
    function create(){
        // comment::create([
        // 'author' => 'Hassan Koraim',
        // 'content'=> 'this is a second test comment for the first post',
        // 'post_id'=> 1,
        // ]);
        Comment::factory(10)->create();
        return redirect('/comment/index');
    }
   
}

