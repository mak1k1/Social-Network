<div class="container">
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        Mozno niekedy fotka
                    </td>
                    <td>
                        <a href="{{ route('user.show',$request->sender->id) }}">{{ $request->sender->getFullName() }}</a>
                    </td>
                    <td>
                        <form action="{{ route('user.respondToFriendRequest', $request->sender->id)}}"  method="post">
                            @csrf
                            <button class="btn btn-link" name="submit" type="submit" value="accept">
                                <img src="{{ asset('/img/accept.svg') }}" alt="Add Friend" height="30px">
                            </button>
                            <button class="btn btn-link" name="submit" type="submit" value="deny">
                                <img src="{{ asset('/img/reject.svg') }}" alt="Add Friend" height="30px">
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>