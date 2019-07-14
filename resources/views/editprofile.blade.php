@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3 class="subtitle">Edit your information</h3>
    <div class="container p-3">
    <form action="route('editProfile.submit')" method="post">
        @csrf
        <div class="form-group">
            <label class="" for="age">Age</label>
            <input type="text" name="age" id="age" value="{{$user->age}}">
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
    </div>
</div>
@endsection