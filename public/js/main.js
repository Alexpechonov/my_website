Vue.http.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;

Vue.component('references', {
    template: '#refs-template',

    data: {
        list: [],

        newReference: {
            name: '',
            reference: ''
        }
    },

    data: function () {
        return {
            list: []
        };
    },

    created: function () {
        this.fetchReferences();
    },

    methods: {
        fetchReferences: function () {
            this.$http.get('/references').then((references) => {
                console.log(references);
                this.list = references.data;
                console.log(this.list);
            });
        },

        createReference: function () {
            var input = this.newReference;
            this.$http.post('/reference', input)
                .then(() => {
                    // success callback
                    $('.modal').modal('toggle');
                    this.newReference = { name: '', reference: '' }
                    this.fetchReferences();
                }, (data) => {
                    // error callback
                   console.log(data);
                });

        },

        deleteReference: function (reference) {

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