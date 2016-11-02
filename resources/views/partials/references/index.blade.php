<ul class="info-list">
    @foreach($user->references()->get()->chunk(2) as $refs )
        <div class="col-lg-12">
            @foreach($refs as $ref)
                @include('partials.references.show', ['ref' => $ref])
            @endforeach
        </div>
    @endforeach
</ul>