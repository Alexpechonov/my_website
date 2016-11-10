<div class="info-list">
    <references> </references>
</div>

<template id="refs-template">
        <li v-for="ref in list">
            <a href="@{{ ref.reference }}">@{{ ref.name }}</a>
        </li>
</template>