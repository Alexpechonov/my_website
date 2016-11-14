<a href="@{{ ref.reference }}">@{{ ref.name }}</a>
<button type="submit" @click="deleteReference(ref)">
    <i class="fa fa-times del-ref"></i>
</button>