Vue.component('logo-comp', {
    template: '#logo-template',

    data: function () {
        return {

        };
    },

    methods: {
        updatePhoto: function () {
            var data = new FormData();
            data.append('photo', $("#upload-image").prop('files')[0]);

            this.$http.post('/upload/photo', data)
                .then((data) => {
                    // success callback

                    var response = JSON.parse(data.body);
                    console.log(response);
                    if(response.success) {
                        $('#logo').attr('src', response.photo_url);
                    } else {
                        if(response.message == undefined) {
                            alert(response.errors.photo);
                            $('.btn-file').button('reset');
                            return;
                        }
                        alert(response.message);
                    }
                    $('.btn-file').button('reset');
                }, (data) => {
                    // error callback
                    console.log(data);
                });

        },
    },
});
