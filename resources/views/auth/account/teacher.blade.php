<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <img class="avatar" src="./images/folder.jpg" alt="Avatar">
                </div>
                <div class="col-lg-6">
                    <ul class="info-list">
                        <li>{{ $user->name }}</li>
                        <li>{{ $user->group->faculty->getName() }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-2">
                    Контакты:
                    <button class="btn btn-primary" data-toggle="modal" data-target=".store-reference-modal">Добавить</button>

                    <div class="modal fade store-reference-modal" tabindex="-1" role="dialog" aria-labelledby="storeReference" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="storeReference">Заголовок</h4>
                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <ul class="info-list">
                        @foreach($user->references()->get()->chunk(2) as $refs )
                            <div class="col-lg-12">
                                @foreach($refs as $ref)
                                    <div class="col-lg-6">
                                        <li><a href="{{ $ref->reference }}">{{ $ref->name }}</a></li>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 well" style="margin-top:20px">
    <div class="col-lg-6">
        <h3>Создание поста</h3>
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['url' => route('post.store') ]) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Заголовок:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'Сообщение:') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Создать запись', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row posts-list">
            <div class="col-lg-12">
                @foreach($posts as $post )
                    <div class="row">
                        <div class="col-lg-12 well$request">
                            {{ $post->title }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
