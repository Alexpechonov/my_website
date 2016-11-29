Vue.component('logo-comp', {
    template: '#logo-template',

    data: function () {
        return {

        };
    },

    methods: {
        updatePhoto: function () {
            console.log("worked");

            var data = new FormData();
            data.append('photo', $("#upload-image").prop('files')[0]);

            this.$http.post('/upload/photo', data)
                .then((data) => {
                    // success callback
                    console.log(data);
                }, (data) => {
                    // error callback
                    console.log(data);
                });

        },
    },
});
