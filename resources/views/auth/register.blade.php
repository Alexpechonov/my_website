<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    {{ Html::style('css/auth/style.css') }}
    {{ Html::style('css/select2.min.css') }}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- //end-smoth-scrolling -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,600italic,700,300italic' rel='stylesheet' type='text/css'>
</head>
<body>
    <h1>Sign Up</h1>
    <div class="main">
        <div class="login-top left">
            <h3>Register</h3>
            <form method="post" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <input type="text" name="name" class="name" value="{{ old('name') }}" placeholder="Your Name" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <input type="email" class="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <input type="password" class="password" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <input type="password" class="password" name="password_confirmation" placeholder="Confirm Password" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif

                <div class="form-group {{ $errors->has('group_id') ? ' has-error' : '' }}">
                        <select name="group_id" class="selectpicker" style="width:200px">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->number }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('group_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('group_id') }}</strong>
                            </span>
                        @endif
                </div>
                <input type="submit" value="Register">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    {{ Html::script('js/app.js') }}
    {{ Html::script('js/select2.min.js') }}
    <script>
        $(document).ready(function(){
            $('select').select2();
        });
    </script>
</body>
</html>