@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-3">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $user->getFullName() }}</h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Age: <b>{{$user->getAge()}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        
    <div class="container">
        <div class="col-md-10 col-md-offset-3">
            <h3 class="subtitle">User Posts</h3>
            @foreach ($posts as $post)
            @include('partials.post',[ 'post'=> $post ])
            @endforeach
        </div>
    </div>
    
    

    

@endsection

