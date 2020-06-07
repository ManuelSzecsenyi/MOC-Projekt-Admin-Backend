@include('header')

<div class="container mt-5 table-responsive">

    <h1>Users</h1>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">UID</th>
                <th scope="col">Display Name</th>
                <th scope="col">Mail</th>
                <th scope="col">Settings</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->uid }}</th>
                        <td>{{ $user->displayName }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@include('footer')