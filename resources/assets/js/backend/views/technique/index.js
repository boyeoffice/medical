import VueSuggestions from '../vendor/suggestions'
import DataViewer from '../vendor/BoxTableTech.vue'
export default {
	components: {VueSuggestions, DataViewer},
	data(){
		return{
			thead: [
			{label: 'ID'},
			{label: 'Técnica Realizada'},
			{label: 'Estágio'},
			{label: 'Action'}
			],
			title: 'Técnica',
			modelTech: [],
			modelSpec: [],
			isLoading: {spec: false, tech: false},
			form: {estagio: '', tecnica_realizada: ''},
			initialize: '/md-vs2/manage/tech',
			store: '/md-vs2/manage/tech',
			method: 'post',
			isSending: false,
			errors: [],
			source: '/md-vs2/manage/tech',
			BoxClass: 'box box-primary',
			showFilter: false,
				model: {
                    data: []
                },
                params: {
                    column: 'id',
                    direction: 'desc',
                    per_page: 10,
                    page: 1,
                    search_column: 'id',
                    search_operator: 'equal_to',
                    search_query_1: '',
                    search_query_2: ''
                },
                operators: {
                    equal_to: '=',
                    not_equal: '<>',
                    less_than: '<',
                    greater_than: '>',
                    less_than_or_equal_to: '<=',
                    greater_than_or_equal_to: '>=',
                    in: 'IN',
                    not_in: 'NOT IN',
                    like: 'LIKE',
                    between: 'BETWEEN'
                },
                filter: []
		}
	},
	beforeMount(){
		document.title = 'Técnica'
		this.$store.commit('title_top_data', 'Técnica')
		this.fetchData()
	},
	methods: {
		fetchTech(){
			this.isLoading.tech = true
				axios.get('/md-vs2/manage/searchtech?search=' + this.form.tecnica_realizada).then(res => {
					Vue.set(this.$data, 'modelTech', res.data)
					this.isLoading.tech =false
				})
			},
			fetchSpec(){
				this.isLoading.spec = true
				axios.get('/md-vs2/manage/searchspecialty?search=' + this.form.estagio).then(res => {
					Vue.set(this.$data, 'modelSpec', res.data)
					this.isLoading.spec = false
				})
			},
			save(){
				this.isSending = true
				axios[this.method](this.store, this.form).then(res => {
					this.isSending = false
					this.form = {estagio: '', tecnica_realizada: ''}
					this.errors = []
					toastr.success('Operation was successful!')
					this.fetchData()
				}).catch(err => {
					this.isSending = false
					if(err.response.status === 422){
						this.errors = err.response.data
					}
				})
			},
			            next() {
                if(this.model.next_page_url) {
                    this.params.page++
                    this.fetchData()
                }
            },
            prev() {
                if(this.model.prev_page_url) {
                    this.params.page--
                    this.fetchData()
                }
            },
            sort(column) {
                if(column === this.params.column) {
                    if(this.params.direction === 'desc') {
                        this.params.direction = 'asc'
                    } else {
                        this.params.direction = 'desc'
                    }
                } else {
                    this.params.column = column
                    this.params.direction = 'asc'
                }

                this.fetchData()
            },
            fetchData() {
                var vm = this
                Nprogress.start()
                axios.get(this.buildURL())
                    .then(function(response) {
                        Vue.set(vm.$data, 'model', response.data.model)
                        Nprogress.done()
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },
            buildURL() {
                var p = this.params
                return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            },
            editData(item){
            	this.form = item
            },
            delData(index, item){
            	axios.delete(this.store + '/' + item.id).then(res => {
            		toastr.success('Operation was successful!')
            		this.model.data.splice(index, 1)
            	})
            }
	}
}