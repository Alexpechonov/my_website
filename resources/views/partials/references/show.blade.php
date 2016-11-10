<a href="@{{ ref.reference }}">@{{ ref.name }}</a>
<button type="submit" @click="delete(ref)">
    <i class="fa fa-times del-ref"></i>
</button>