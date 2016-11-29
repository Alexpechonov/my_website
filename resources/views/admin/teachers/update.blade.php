@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin panel</div>
                    <div class="panel-body">

                        @if(Session::has('messages'))
                            <div class="alert alert-success">
                                <ul>
                                    @foreach (Session::get('messages') as $message)
                                        <li style="margin: 0 15px">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3 style="margin-bottom: 15px;">Обновление списка преподавателей</h3>
                        <div class="col-lg-12">
                            <div class="row">
                                {!! Form::open(['url' => route('teachers.update') ]) !!}
                                {!! Form::submit('Обновить список', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
