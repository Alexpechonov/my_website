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
                    </div>
                    <div class="form-group">
                        {!! Form::label('groups[]', 'Выберите группы:') !!}
                        <select id="choose-groups" name="groups[]" class="form-control" multiple="multiple">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->number }}</option>
                            @endforeach
                        </select>
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
                        <div class="col-lg-12 well">
                            <strong>{{ $post->title }} for: @foreach($post->groups()->get() as $group) {{ $group->number.',' }} @endforeach</strong>
                            <br/>
                            <small>{{ $post->body }}</small>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12" style="margin-top:20px">
    <template id="shedule-template">
        <input type="hidden" v-model="teacher_id" :value="{{ $user->getApiId() }}">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <strong>Расписание</strong>
                </tr>
                </thead>
                <tbody>
                <tr style="border: 1px solid #ddd" v-for="shedule in shedules">
                    <td style="border-right: 1px solid #ddd">@{{ shedule.weekDay }}</td>
                    <td style="border-right: 1px solid #ddd" v-for="mod in shedule.modules">
                        @{{ mod.lessonTime }}  @{{ mod.subject }} (@{{ mod.lessonType }})<br>
                        @{{ mod.auditory }}<br>
                        гр. @{{ mod.studentGroups }}
                        <template v-if="mod.numSubgroup != 0">
                            (п.@{{ mod.numSubgroup }})
                        </template>
                        <br>
                        недели:
                        <template v-if="mod.weekNumbers.length == 5">
                            все
                        </template>
                        <template v-else>
                            @{{ mod.weekNumbers }}
                        </template>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </template>
    <shedule-comp></shedule-comp>
</div>