@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3 class="subtitle">Edit your information</h3>
    <div class="container p-3">
    <form action="{{ route('editProfile.submit', \Auth::user()->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label class="" for="birth_date">Birth date</label>
            <input type="date" name="birth_date" id="birth_date" value="{{$user->birth_date}}">
        </div>
        <button class="btn btn-danger" name="submit" value="cancel" type="submit">Cancel</button>
        <button class="btn btn-success" name="submit" value="submit" type="submit">Submit</button>
    </form>
    </div>
</div>
@endsection