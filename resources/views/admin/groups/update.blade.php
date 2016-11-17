@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin panel</div>
                    <div class="panel-body">

                        <h3 style="margin-bottom: 15px;">Обновление списка групп</h3>

                        <div class="col-lg-12">
                            <div class="row">
                                {!! Form::open(['url' => route('groups.update') ]) !!}
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
