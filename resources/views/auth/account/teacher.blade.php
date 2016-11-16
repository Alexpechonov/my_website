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
                <div class="col-lg-3">
                    Контакты:
                    <button class="btn btn-primary" data-toggle="modal" data-target=".store-reference-modal">Добавить</button>
                </div>
                <div class="col-lg-9">
                    @include('partials.references.index')
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

                    <div class="form-group">
                        <select id="example-getting-started" multiple="multiple">
                            <option value="cheese">Cheese</option>
                            <option value="tomatoes">Tomatoes</option>
                            <option value="mozarella">Mozzarella</option>
                            <option value="mushrooms">Mushrooms</option>
                            <option value="pepperoni">Pepperoni</option>
                            <option value="onions">Onions</option>
                        </select>
                    </div>      </div>
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
                        <div class="col-lg-12 well">
                            {{ $post->title }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
