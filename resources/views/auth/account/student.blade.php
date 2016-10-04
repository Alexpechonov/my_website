<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <img class="avatar" src="./images/folder.jpg" alt="Avatar">
                </div>
                <div class="col-lg-6">
                    <ul class="info-list">
                        <li>{{$user->name}}</li>
                        <li>{{$user->group->name}}</li>
                        <li>{{$user->group->speciality}}</li>
                        <li>{{$user->group->department}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-2">
                    Контакты:
                    {!! Form::open(['url' => route('reference.create') ]) !!}

                    {!! Form::close() !!}
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
<div class="col-lg-12"></div>
