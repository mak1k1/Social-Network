<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{





    public function submit(Request $request){
        $data = new Post($request->all());
        $data->created_by = \Auth::user()->_id;
        $data->save();

        if($data){
            return redirect()->route('home');
        }
        else{
            return back();
        }
    }
}
