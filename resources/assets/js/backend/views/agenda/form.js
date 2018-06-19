import Datepicker from 'vuejs-datepicker'
export default {
    components: {Datepicker},
    data(){
        return{
            form: {},
            method: 'post',
            store: '/md-vs2/manage/calendar',
            initialize: '/md-vs2/manage/calendar',
            errors: {},
            isSaving: false
        }
    },
    mounted(){
        if(this.$route.meta.mode == 'edit'){
            this.method = 'patch'
            this.initialize = '/md-vs2/manage/calendar/' + this.$route.params.id + '/edit'
            this.store = '/md-vs2/manage/calendar/' + this.$route.params.id
            this.fetchdata()
        }
    },
    methods: {
        save(){
            this.isSaving = true
            axios[this.method](this.store, this.form).then(res => {
              this.$router.push('/backend/agenda')  
            }).catch(err => {
                this.isSaving = false
                this.errors = err.response.data
            })
        },
        fetchdata(){
            axios.get(this.initialize).then(res => {
                this.form = res.data
            })
        },
        clearForm(){
            this.form = {}
        },
        deleteForm(){
            axios.delete(this.store).then(res => {
                this.$router.push('/backend/agenda')
                toastr.success('Deleted')
            })
        }
    }
}