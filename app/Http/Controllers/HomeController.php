<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts()->get();

        return view('home')->with(compact(['user', 'posts']));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function mainPage()
    {
        $teachers = User::teachers()->count();
        $students = User::students()->count();
        $posts = Post::count();

        return view('welcome')->with(compact(['teachers', 'students', 'posts']));
    }
}
