import Select2 from '../vendor/Select2.vue'
import Axios from 'axios';
export default{
    components: {Select2},
    data(){
        return{
            modelTipo: ['Congresso','Curso', 'Reunião', 'Científica/Clínica', 'Mesa', 'Redonda'],
            modelLocal: ['Nacional','Internaciona'],
            form: {},
            errors: {},
            method: 'post',
            initialize: '',
            store: '/md-vs2/manage/formacao',
            isSaving: false,
            fileData: {}
        }
    },
    mounted(){
        if(this.$route.meta.mode == 'edit'){
            this.method = 'patch'
            this.initialize = '/md-vs2/manage/formacao/' + this.$route.params.id + '/edit'
            this.store = '/md-vs2/manage/formacao/' + this.$route.params.id
            this.fetchData()
        }
    },
    methods: {
        save(){
            this.isSaving = true
            axios[this.method](this.store, this.form).then(res => {
                this.$router.push('/backend/formacao')
                toastr.success('Operation was successful')
            }).catch(err => {
                this.isSaving = false
                this.errors = err.response.data
                if(err.response.status === 422){
                    toastr.error('Please fill all the form')
                }
            })
        },
        handleFileUpload(e){
            this.fileData = this.$refs.file.files[0]
            setTimeout(() => this.submitFile(), 1000)
        },
        submitFile(){
            let formData = new formData()
            formData.append('file', this.fileData)
            axios.post('/upload/file', formData, {headers: {'Content-Type': 'multipart/form-data'} }).then(res => {

            })
        },
        fetchData(){
            const vm = this
            axios.get(this.initialize).then(res => {
                Vue.set(vm.$data, 'form', res.data)
            })
        },
        deleteForm(){
            axios.delete(this.store).then(res => {
                this.$router.push('/backend/formacao')
                toastr.success('Deleted')
            })
        },
        clearForm(){
            this.form = {}
        }
    }
}