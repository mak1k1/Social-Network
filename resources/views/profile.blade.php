@extends('user')


@section('panelTable')
<tbody>
    <tr>
        <td>Age: <b>{{$user->getAge()}}</b></td>
    </tr>
    <tr>
        <td>
            <form action=" {{ route('user.edit', $user->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-warning">Edit profile</button>
            </form>
        </td>
    </tr>
</tbody>
@endsection
