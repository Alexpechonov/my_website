<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Group;
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
        $groups = Group::all();

        $posts = ($user->hasRole('student'))
                    ? $user->group->posts()->get()
                    : $user->posts()->get();

        return view('home')->with(compact(['user', 'posts', 'groups']));
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
