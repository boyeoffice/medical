export default {
    data(){
        return{
            form: {},
            method: 'post',
            store: '/md-v2/manage/event-calendar',
            initialize: '/md-v2/manage/event-calendar'
        }
    },
    mounted(){
        if(this.$route.meta.mode == 'edit'){
            this.method = 'patch'
            this.initialize = '/md-v2/manage/event-calendar/' + this.pramas.id + '/edit'
            this.store = '/md-v2/manage/create-event/' + this.pramas.id
        }
    },
    methods: {
        save(){
            axios[this.method](this.store, this.form).then(res => {
                
            })
        }
    }
}