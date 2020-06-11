@include('header')

<div class="container mt-5">

    <form action="/user/{{$user->uid}}" enctype="multipart/form-data" method="post" class="form-horizontal">

        <!-- Form Name -->
        <legend>Edit User</legend>

    {{ csrf_field() }}

    <!-- Display name input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="displayName">Display name</label>
            <div class="col-md-4">
                <input id="displayName"
                       name="displayName"
                       type="text"
                       placeholder="Display name"
                       class="form-control input-md"
                       required=""
                       value="{{ $user->displayName }}" >

                @if ($errors->has('displayName'))
                    <strong>{{ $errors->first('displayName') }}</strong>
                @endif

            </div>
        </div>

        <!-- Email input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>
            <div class="col-md-4">
                <input id="email"
                       name="email"
                       type="text"
                       placeholder="Email"
                       class="form-control input-md"
                       required=""
                       value="{{ $user->email }}">

                @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
                @endif

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/user/{{$user->uid}}" class="btn btn-danger">Cancel</a>
    </form>






</div>


@include('footer')