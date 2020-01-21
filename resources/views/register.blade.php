@extends('template.template')
@section('content')
    <div class="grid">
        @if($errors->any())
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                @foreach ($errors->all() as $error)
                    <span>{{$error}}</span><br>
                @endforeach
            </div>
        @endif
        <form action="{{route('send_register')}}" method="POST" class="form login">
            {{ csrf_field() }}
            <div class="form__field">
                <label class="lb-login" for="login_name">Name</label>
                <input id="login_name" type="text" name="name" class="form__input" placeholder="Name" required>
            </div>

            <div class="form__field">
                <label class="lb-login" for="login_username">E-mail</label>
                <input id="login_username" type="text" name="email" class="form__input" placeholder="E-mail" required>
            </div>

            <div class="form__field">
                <label class="lb-login" for="login_password">Password</label>
                <input id="login_password" type="password" name="password" class="form__input" placeholder="password" required>
            </div>
            <div class="form__field">
                <label class="lb-login" for="login_password_confirmation">Confirm Password</label>
                <input id="login_password_confirmation" type="password" name="password_confirmation" class="form__input" placeholder="password" required>
            </div>

            <div class="form__field">
                <input type="submit" value="Register">
            </div>
        </form>

    </div>
@endsection