<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Group;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Count posts to display in the account page.
     */
    const COUNT_POSTS_TO_DISPLAY = 3;

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
                    ? $user->group->posts()->paginate(self::COUNT_POSTS_TO_DISPLAY)
                    : $user->posts()->paginate(self::COUNT_POSTS_TO_DISPLAY);

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
