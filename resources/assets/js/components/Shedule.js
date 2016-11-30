Vue.component('shedule-comp', {
    template: '#shedule-template',

    data: function () {
        return {
            teacher_id: 1,
            group_id: 1,
            shedules: {}
        }
    },

    watch: {
        teacher_id: function() {
            this.getTeacherShedule();
        },
        group_id: function() {
            this.getStudentShedule();
        }
    },

    methods: {
        getTeacherShedule: function () {
            this.$http.get('/shedule/teacher/' + this.teacher_id).then((shedule) => {
                this.shedules = shedule.data;
            });
        },

        getStudentShedule: function () {
            this.$http.get('/shedule/student/' + this.group_id).then((shedule) => {
                this.shedules = shedule.data;
            });
        },
    },
});