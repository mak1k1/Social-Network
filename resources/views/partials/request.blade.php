<div class="container">
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        Mozno niekedy fotka
                    </td>
                    <td>
                        <a href="{{ route('user.show',$request->user2) }}">{{ $request->getFullName() }}</a>
                    </td>
                    <td>
                        <form action="{{ route('user.sendFriendRequest', $request->id) }}" method="post">
                            @csrf
                            <button class="btn btn-link" type="submit">
                            <input type="hidden" name="recipient" value="{{ $request->id }}">
                                <img src="{{ asset('/img/addFriend.png') }}" alt="Add Friend" height="30px">
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>