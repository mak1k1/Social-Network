<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Relationship;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
        'posts' => Post::orderBy('created_at', 'desc')->get(),
        'other_users' => User::where('_id', '!=', \Auth::user()->_id)->get(),
        'requests' => Relationship::join('users', '_id', '=', 'action_user')->where('user1', \Auth::user()->_id)->orWhere('user2', \Auth::user()->_id)->where('action_user','!=', \Auth::user()->_id)->get()
    ]);
    }
}
