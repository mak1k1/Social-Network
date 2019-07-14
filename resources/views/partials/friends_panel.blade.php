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
                </td>
            </tr>
        </tbody>
    </table>
</div>