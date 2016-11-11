Vue.http.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': window.Laravel.csrfToken
    }
});

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
    },

    methods: {
        delete: function (reference) {

            this.$http.delete('reference/' + reference.id)
                .then((data) => {
                    // success callback
                    var response = JSON.parse(data.body);
                    console.log(response);
                    if(response.success) {
                        this.list.$remove(reference);
                        alert(response.messages[0]);
                    }
                }, (data) => {
                    // error callback
                    var response = JSON.parse(data.body);
                    console.log(response);
                    alert(response.messages[0]);
                });

        }
    },
});

new Vue({
    el: 'body'
});