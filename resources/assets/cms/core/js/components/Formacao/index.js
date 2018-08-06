export default {
    data(){
        return{
            thead: [
                {label: 'Tipo'},
                {label: 'Nome'},
                {label: 'Entidade Organizadora'},
                {label: 'Local'},
                {label: 'Data'},
                {label: 'Nacional/Internaciona'},
                {label: 'Nota/Créditos'},
                {label: 'Observações'}
            ],
            model: { data: [] },
            params: {
                column: 'id',
                direction: 'desc',
                per_page: 10,
                page: 1
            },
            source: '/md-vs2/manage/formacao'
        }
    },
    mounted: function(){
        this.$store.commit('title_top_data', 'Formacao')
		document.title = 'Formacao'
        this.fetchData()
    },
    methods: {
        buildURL(){
            const p = this.params
            return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}`
        },
        fetchData(){
            const vm = this
            Nprogress.start()
            axios.get(this.buildURL()).then(res => {
                Vue.set(vm.$data, 'model', res.data)
                Nprogress.done()
             })  
        },
        next(){
            if(this.model.next_page_url){
                this.params.page ++
                this.fetchData()
            }
        },
        prev(){
            if(this.model.prev_page_url){
               this.params.page --
               this.fetchData() 
            }
        }
    }
}