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
            attachment: {},
            file: '',
            display: '',
            fileName: '',
            isLoading: false,
            fadeIn: false
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
        submitFile(){
            this.isLoading = true
            let formData = new FormData()
            formData.append('name', this.fileName)
            formData.append('file', this.attachment)
            axios.post('/md-vs2/manage/upload-file', formData, {headers: {'Content-Type': 'multipart/form-data'} }).then(res => {
                this.isLoading = false
                this.form.anexos = res.data.url
                this.closeModal()
            }).catch(err => {
                this.isLoading = false
                this.errors = err.response.data
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
        },
        showModal(){
            this.display = 'block'
            this.fadeIn = true
        },
        closeModal(){
            this.display = ''
            this.fadeIn = false
        },
        addFile(){
            this.attachment = this.$refs.file.files[0]
        }
    }
}