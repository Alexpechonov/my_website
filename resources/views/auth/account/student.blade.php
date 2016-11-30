<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <template id="logo-template">
                        <img class="avatar" id="logo" src="{{ $photo_url }}" alt="Avatar">
                        <div class="control-group" style="margin-bottom: 5px;">
                            <div class="controls clearfix">
                                <span class="btn btn-success btn-file">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <i class="icon-plus"></i>
                                    <span class="upload-logo-text">Изменить фото</span>
                                    <input @change="updatePhoto()" type="file" name="logo" id="upload-image"/>
                                </span>
                            </div>
                        </div>
                    </template>
                    <logo-comp></logo-comp>
                </div>
                <div class="col-lg-6">
                    <ul class="info-list">
                        <li>{{ $user->name }}</li>
                        <li>{{ $user->group->getNumber() }}</li>
                        <li>{{ $user->group->faculty->getName() }}</li>
                        <li>{{ $user->group->speciality->getName() }}</li>
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

<div class="col-lg-12" style="margin-top:15px">
    @foreach($posts as $post )
        <div class="col-lg-6">
            <div class="col-lg-12 well">
                <strong>{{ $post->title }} for: @foreach($post->groups()->get() as $group) {{ $group->number.',' }} @endforeach</strong>
                <br>
                <small>{{ $post->body }}</small>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}
</div>


<div class="col-lg-12" style="margin-top:20px">
    <template id="shedule-template">
        <input type="hidden" v-model="group_id" :value="{{ $user->getApiGroupId() }}">
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
                        <template v-if="mod.teacher.firstName">
                            <br>@{{ mod.teacher.lastName }}  @{{ mod.teacher.firstName[0] }}. @{{ mod.teacher.middleName[0] }}.
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

