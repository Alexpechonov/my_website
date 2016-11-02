{!! Form::open(['url' => route('reference.store') ]) !!}
<div class="modal-body">
    <div class="form-group">
        {!! Form::label('name', 'Название ссылки:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('reference', 'Ссылка:') !!}
        {!! Form::text('reference', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal">Закрыть</button>
    {!! Form::submit('Создать ссылку', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}