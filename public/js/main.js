Vue.component('references', {
    template: '#refs-template',

    data: function () {
        return {
            list: []
        };
    },

    created: function () {
        $.getJSON('/api/references', function (references) {
            this.list = references;
        }.bind(this));
    }
});

new Vue({
    el: 'body'
});