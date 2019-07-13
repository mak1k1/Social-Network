<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <td>
                    Mozno niekedy fotka
                </td>
                <td>
                    <a href="{{ route('user.show',$user->id) }}">{{ $user->getFullName() }}</a>
                </td>
                <td>
                    <form action="{{ route('user.sendFriendRequest', $user->id) }}" method="post">
                        @csrf
                        <button class="btn btn-link" type="submit">
                        <input type="hidden" name="recipient" value="{{ $user->id }}">
                            <img src="{{ asset('/img/addFriend.png') }}" alt="Add Friend" height="30px">
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>