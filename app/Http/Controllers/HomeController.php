<?php

namespace App\Http\Controllers;

use App\Group;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

        $photo_url = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjI1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjMxcHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NTAweDUwMDwvdGV4dD48L3N2Zz4=';
        if (!empty(Auth::user()->photo_url) && File::exists($check_url = 'uploads/images/'.Auth::user()->photo_url)) {
            $photo_url = $check_url;
        }

        return view('home')->with(compact(['user', 'posts', 'groups', 'photo_url']));
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
