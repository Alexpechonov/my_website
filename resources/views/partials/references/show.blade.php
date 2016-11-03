<div class="col-lg-6">
    <li>
        <a href="{{ $ref->reference }}">{{ $ref->name }}</a>
        {!! Form::open(['url' => route('reference.destroy', ['id' => $ref->id]), 'class' => 'form-del-ref']) !!}
            {{ method_field('DELETE') }}
            <button type="submit">
                <i class="fa fa-times del-ref"></i>
            </button>
        {!! Form::close() !!}
    </li>
</div>