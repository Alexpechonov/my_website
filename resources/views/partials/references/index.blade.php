<div class="info-list">
    <references></references>
</div>

<template id="refs-template">
    <li v-for="ref in list">
        @include('partials.references.show')
    </li>
    @include('partials.references.create')
</template>