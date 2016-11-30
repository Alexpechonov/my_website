Vue.component('shedule-comp', {
    template: '#shedule-template',

    data: function () {
        return {
            teacher_id: 1,
            shedules: {}
        }
    },

    watch: {
        teacher_id: function() {
            this.getShedule();
        }
    },

    methods: {
        getShedule: function () {
            this.$http.get('/shedule/teacher/' + this.teacher_id).then((shedule) => {
                this.shedules = shedule.data;
            });
        },
    },
});