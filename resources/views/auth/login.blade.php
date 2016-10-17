<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    {{ Html::style('css/auth/style.css') }}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- //end-smoth-scrolling -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,600italic,700,300italic' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>Sign In</h1>
<div class="main">
    <div class="login-top right">
        <h3>Login</h3>
        <form action="#" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <input type="text" class="email1" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input type="password" class="password1" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="checkbox" id="brand" name="remember">
            <label for="brand"><span></span> Remember me</label>
            <div class="login-bottom">
                <ul>
                    <li><a href="{{ url('/password/reset') }}">Forgot password?</a></li>
                    <li><input type="submit" value="LOGIN"></li>
                    <div class="clear"></div>
                </ul>
            </div>
        </form>
    </div>
    <div class="clear"></div>
</div>
</body>
</html>