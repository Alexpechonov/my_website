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

