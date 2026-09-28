<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD

class JobController extends Controller
{
    function index(){
        return view('index');
=======
use App\Models\Job;
class JobController extends Controller
{
    function index(){
        $jobs = Job::all();
        return view('job/index', ['jobs'=> $jobs]);
>>>>>>> b284a35 (Update Job board)
    }
}
 