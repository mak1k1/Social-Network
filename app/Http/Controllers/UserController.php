<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Relationship;

class UserController extends Controller
{

    public function show($id){
        return view('user',[
            'posts' => Post::where('created_by', '=' ,$id)->orderBy('created_at', 'desc')->get(),
            'user' => User::find($id),
        ]);
    }
    
    public function getAuth(){
        return \Auth::user();
    }


    public function sendFriendRequest(Request $request){
        $this->getAuth()->befriend(User::find($request->recipient));
        return redirect('home');
    }

}