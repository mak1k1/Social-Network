@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row create_post">
            <div class="col-md-10 col-md-offset-3">
                <div class="card">
                    <div class="card-header">Share something</div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ route('post.submit') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="post_title"><b>Give your post a title</b></label>
                                <input class="form-control" type="text" name="post_title" id="post_title">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="post_content" id="post_content" rows="7"></textarea>
                            </div>
                            <button type="submit mx-auto" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-4">
        <div class="col-md-10 col-md-offset-3">
            <h3 class="subtitle">Other Posts</h3>

            @foreach ($posts as $post)
                @include('partials.post',[
                    'post'=> $post,
                    ])
            @endforeach
        </div>
    </div>

    @auth
        
    
    <div class="container p-4">
        <div class="col-md-10 col-md-offset-3">
            <h3 class="subtitle">Get to know other people</h3>
            @foreach ($other_users as $user)
            @include('partials.user_panel',[
                'user' => $user,
                ])
            @endforeach
        </div>
    </div>

    <div class="container p-4">
        <div class="col-md-10 col-md-offset-3">
            <h3 class="subtitle">Your requests</h3>
            @foreach ($requests as $request)
                @include('partials.request', [
                    'request' => $request
                ])
            @endforeach
        </div>
    </div>
    
    @endauth




@endsection
