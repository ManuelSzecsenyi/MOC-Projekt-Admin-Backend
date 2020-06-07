@include('header')

<div class="container mt-5">

    <ul class="list-group">
        <li class="list-group-item"><strong>Username: </strong> {{ $user->displayName }}</li>
        <li class="list-group-item"><strong>Mail: </strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Created: </strong>  {{ $user->metadata->createdAt->format("Y-m-d H:i:s") }}</li>
        <li class="list-group-item"><strong>Email verified: </strong>

            @if($user->emailVerified)
                <span class="btn btn-success btn-sm"><i class="fas fa-check"></i></span>
            @else
                <span class="btn btn-danger btn-sm"><i class="fas fa-times"></i></span>
            @endif

        </li>
    </ul>

    <div class="mt-2">
        <a href="/user/{{$user->uid}}/delete" type="button" class="btn btn-danger">Delete user</a>
    </div>




</div>


@include('footer')