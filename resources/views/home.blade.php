@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
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
