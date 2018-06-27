export default {
    data(){
        return{
            model: { data: []},
            params: {
                column: 'id',
                per_page: 1,
                direction: 'desc',
                page: 1
            },
            source: '/md-vs2/manage/atividade',
            thead: [
                {label: 'Tipo de Trabalho'},
                {label: 'Título'},
                {label: 'Nome da Revista/Livro'},
                {label: 'Data'},
                {label: 'Estado'},
                {label: 'ndexada à PubMed (PMID)'},
                {label: 'Factor de Impacto à data da publicação'},
                {label: 'Autores'},
                {label: 'Abstract'},
                {label: 'Primeiro Autor'},
                {label: 'Prémios'},
                {label: 'Observações'}

            ]
        }
    },
    mounted(){
        this.fetchData()
    },
    methods: {
        buildURL(){
            const p = this.params
            return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}`
        },
        fetchData(){
            Nprogress.start()
            const vm = this
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