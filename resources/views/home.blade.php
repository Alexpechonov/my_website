@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="col-lg-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="margin: 0 15px">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('messages'))
                            <div class="alert alert-success">
                                <ul>
                                    @foreach (Session::get('messages') as $message)
                                        <li style="margin: 0 15px">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if($user->hasRole('student'))
                            @include('auth.account.student', ['user' => $user])
                        @elseif($user->hasRole('teacher'))
                            @include('auth.account.teacher', ['user' => $user])
                        @elseif($user->hasRole('admin'))
                            You're admin
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
