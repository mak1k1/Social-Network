<div class="card mt-3">
    <div class="card-header">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item text-sm-left">
            <span>by <a href="{{ route('user.show',$post->user_id) }}">{{ $post->getAuthor($post->id) }}</a></span>
            </li>
            <li class="nav-item">
                <h5 class="text-center"><b>{{$post->post_title}}</b></h5>
            </li>
            <li class="nav-item text-sm-right">
                <span class="text-right">{{$post->created_at->diffForHumans()}}</span>
            </li>
        </ul>
    </div>
    <div class="card-body">
        {{$post->post_content}}
    </div>
</div>