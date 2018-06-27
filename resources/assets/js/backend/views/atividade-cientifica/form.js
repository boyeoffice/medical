import Select2 from '../vendor/Select2.vue'
export default{
    components: { Select2 },
    data(){
        return{
            form: {premios: 'Yes', primeiro: 'Yes', indexada: 'Yes'},
            dataTipo: ['Artigo', 'Poster', 'Comunicação Livre', 'Capítulo de Livro'],
            dataEstado: ['Publicado', 'Aguarda Publicação'],
            isSaving: false,
            store: '/md-vs2/manage/atividade',
            initialize: '/md-vs2/manage/atividade',
            method: 'post'
        }
    },
    beforeMount(){
        if(this.$route.meta.mode == 'edit'){
            this.initialize = '/md-vs2/manage/atividade/' + this.$route.params.id + '/edit'
            this.store = '/md-vs2/manage/atividade/' + this.$route.params.id
            this.method = 'patch'
            this.fetchData()
        }
    },
    methods: {
        save(){
            this.isSaving = true
            axios[this.method](this.store, this.form).then(res => {
                this.isSaving = false
                this.$router.push('/backend/atividade-cientifica')
            }).catch(err => {
                toastr.error('Please fill all the form')
                this.isSaving = false
            })
        },
        handleFileUpload(e){
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createFile(files[0]);
        },
        createFile(file){
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
              vm.form.anexos = e.target.result;
            };
            reader.readAsDataURL(file);
          },
        clearForm() {
            this.form = {}
        },
        deleteForm(){
            axios.delete(this.store).then(res => {
                toastr.success('Deleted')
                this.$router.push('/backend/atividade-cientifica')
            })
        },
        fetchData(){
            Nprogress.start()
            const vm = this
            axios.get(vm.initialize).then(res => {
                Vue.set(vm.$data, 'form', res.data)
                Nprogress.done()
            })
        }
    }
}