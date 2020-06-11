@include('header')

<div class="container mt-5">

    <form action="/user" enctype="multipart/form-data" method="post" class="form-horizontal">

        <!-- Form Name -->
        <legend>Create User</legend>

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
                        value="{{ old('displayName') }}" >

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
                        value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
                @endif

            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Password</label>
            <div class="col-md-4">
                <input type="password" name="password" class="form-control" id="password">

                @if ($errors->has('password'))
                    <strong>{{ $errors->first('password') }}</strong>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>



</div>


@include('footer')