<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Relationship;

class UserController extends Controller
{
    public function show($_id){
        return view('user',[
            'posts' => Post::where('created_by', '=' ,$_id)->orderBy('created_at', 'desc')->get(),
            'user' => User::find($_id),
        ]);
    }

    public function sendFriendRequest(Request $request){
        // dd($request->recipient);
        $sender = \Auth::user();
        $recipient = $request->recipient;

        if(!$this->canSendFriendRequest($recipient)) return back();
        
        $this->befriend($recipient);
        return redirect()->route('home');
    }

    public function canSendFriendRequest($otherUser){
        if(!$otherUser) return false;
        if(!$this->isRelatedWith($otherUser)) return true;
        if(
            $this->isFriendWith($otherUser) ||
            $this->isRequestBetween($otherUser) ||
            $this->isBlockedBy($otherUser)
        )
            return false;

        return true;
    }


    public function isRelatedWith($otherUser){
        return ((Relationship::where('user1', \Auth::user()->_id)->where('user2', $otherUser)->count() > 0) || (Relationship::where('user1', $otherUser)->where('user2', \Auth::user()->_id)->count() > 0));
    }

    public function getRelationship($otherUser){
        if(!$this->isRelatedWith($otherUser)) return false;
        $r1 = Relationship::where('user1', \Auth::user()->_id)->where('user2', $otherUser);
        $r2 = Relationship::where('user1', $otherUser)->where('user2', \Auth::user()->_id);

        if($r1->exists()) return $r1->first();
        if($r2->exists()) return $r2->first();
        return false;
    }

    public function isFriendWith($otherUser){
        $relationship = $this->getRelationship($otherUser);
        if(!$relationship) return false;

        return $relationship->status == 'friendship';
    }

    public function isRequestBetween($otherUser){
        $relationship = $this->getRelationship($otherUser);
        if(!$relationship) return false;
        return $this->getRelationship($otherUser)->status == 'request';
    }

    public function hasFriendRequestFrom($otherUser){
        if(!isRequestBetween($otherUser)) return false;
        return $this->getRelationship($otherUser)->action_user == $otherUser;
    }

    public function hasSentFriendRequestTo($otherUser){
        if(!isRequestBetween($otherUser)) return false;
        return $this->getRelationship($otherUser)->action_user == \Auth::user()->_id;
    }

    public function isBlockedBy($otherUser){
        $relationship = getRelationship($otherUser);
        if(!$relationship) return false;
        return $this->getRelationship($otherUser)->status == 'blocked';

    }

    public function befriend($otherUser){
        $relationship = $this->getRelationship($otherUser);

        if(!$relationship){
            $relationship = new Relationship();
            $relationship->user1 = \Auth::user()->_id;
            $relationship->user2 = $otherUser;
        }
        
        $relationship->action_user = \Auth::user()->_id;
        $relationship->status = 'request';
        $relationship->save();
    
    }


}