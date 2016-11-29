Vue.component('shedule-comp', {
    template: '#shedule-template',

    data: function () {
        return {
            teacher_id: 1,
            shedule: []
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
                this.shedule = shedule.data;
                console.log(this.shedule);
            });
        },
    },
});