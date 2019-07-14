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


    public function sendFriendRequest(Request $request){
        \Auth::user()->befriend(User::find($request->recipient));
        return redirect('home');
    }

    public function respondToFriendRequest(Request $request, $sender){
        $sender = User::find($sender);
        $user = \Auth::user();

        if(!$sender || !$user){
            return redirect()->back()->withInput();
        }

        if($request->submit == 'accept'){
            if($user->hasFriendRequestFrom($sender)){
                $user->acceptFriendRequest($sender);
                return  redirect('home');
            }
        }
        elseif($request->submit == 'deny'){
            if($user->hasFriendRequestFrom($sender)){
                $user->denyFriendRequest($sender);
                return redirect('home');
            }
        }

        return redirect()->back()->withInput();
    }

}