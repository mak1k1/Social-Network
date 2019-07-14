<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Relationship;

class UserController extends Controller
{

    public function show($id){
        $user = User::find($id);
        

        return view($user == \Auth::user() ? 'profile' : 'guest',[
            'posts' => $user->posts,
            'user' => $user,
            'friends' =>$user->getFriends(),
        ]);
    }

    public function submitEditProfile(Request $request){
        if($request->submit == 'cancel') return redirect()->back()->withInput();
        if($request->submit == 'submit'){
            $request->validate([
                'birth_date' => 'date|before:today',
            ]);
            $user = \Auth::user();
            $user->birth_date = $request->birth_date;
            $user->save();
        }
        return $this->show($user->id);
    }

    public function editProfile($id){

        if($id != \Auth::user()->id || !\Auth::check())
            return redirect()->back()->withInputs();
        return view('editprofile', [
            'user' => \Auth::user(),
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