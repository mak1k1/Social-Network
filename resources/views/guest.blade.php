@extends('user')


@section('panelTable')
<tbody>
    <tr>
        <td>Age: <b>{{$user->getAge()}}</b></td>
    </tr>
</tbody>
@endsection
