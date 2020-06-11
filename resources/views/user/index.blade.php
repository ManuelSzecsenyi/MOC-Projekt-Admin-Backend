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
        <a href="/user/{{$user->uid}}/edit" type="button" class="btn btn-primary">Edit user</a>
    </div>

    <div class="mt-2">
        <a href="/user/{{$user->uid}}/sendPasswordReset" type="button" class="btn btn-info">Send password reset link</a>
    </div>

    <div class="mt-2">
        <a href="/user/{{$user->uid}}/delete" type="button" class="btn btn-danger">Delete user</a>
    </div>


    <h2 class="mt-5">Liked movies</h2>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titel</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($likedMovies as $movie)
                <tr>
                    <th scope="row">{{ $movie["id"] }}</th>
                    <td>{{ $movie["title"] }}</td>
                    <td><a class="btn btn-danger" href="/user/{{$user->uid}}/movie/{{$movie['id']}}/delete">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



</div>


@include('footer')