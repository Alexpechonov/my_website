@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        @if($user->isStudent())
                            @include('auth.account.student', ['user' => $user])
                        @elseif($user->isTeacher())
                            @include('auth.account.teacher')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
