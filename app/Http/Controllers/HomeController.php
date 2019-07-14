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
        'other_users' => $this->getNotRelatedUsers(),
        'requests' => \Auth::user()->getFriendRequests(),
        ]);
    }


    //returns Users not related with authorised User
    public function getNotRelatedUsers(){
        $relatedIds = array(\Auth::user()->id);

        foreach(\Auth::user()->getAllFriendships() as $friendship){
            if($friendship->sender_id == \Auth::user()->id){
                array_push($relatedIds, $friendship->recipient_id);
            } 
            elseif($friendship->recipient_id == \Auth::user()->id){
                array_push($relatedIds, $friendship->sender_id);
            }
        }

        return User::whereNotIn('id', $relatedIds)->get();
    }

}
