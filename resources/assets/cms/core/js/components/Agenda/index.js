export default {
    data(){
        return{
            thead: [
                {label: 'Title'},
                {label: 'Start Date'},
                {label: 'End Date'},
                {label: 'Location'},
                {label: 'Notes'},
                {label: 'Created By'}
            ],
            model: { data: [] },
            params: {
                column: 'id',
                direction: 'desc',
                per_page: 10,
                page: 1
            },
            source: '/md-vs2/manage/calendar'
        }
    },
    mounted(){
        this.$store.commit('title_top_data', 'Agenda')
		document.title = 'Agenda'
        this.fetchData()
    },
    methods: {
        fetchData(){
            const vm = this
            Nprogress.start()
            axios.get(this.buildURL()).then(res => {
                Vue.set(vm.$data, 'model', res.data)
                Nprogress.done()
            })
        },
        buildURL(){
            const p = this.params
             return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}`
        },
        next(){
            if(this.model.next_page_url) {
                this.params.page++
                this.fetchData()
            }
        },
        prev(){
            if(this.model.prev_page_url) {
                this.params.page--
                this.fetchData()
            } 
        }
    }
}