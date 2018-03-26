<template>
	<section class="content">
	   <div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h2 class="box-title">Users</h2>
					<div class="box-tools pull-right">
						<router-link to="/backend/manage/users/create" class="btn btn-success btn-sm">Create</router-link>
					</div>
				</div>
					<div class="box-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr><th v-for="th in thead">
									{{th.label}}
								</th></tr>
							</thead>
							<tbody>
								<data-viewer v-for="data in model.data" :data="data" :key="data.id"></data-viewer>
							</tbody>
						</table>
				</div>
			</div>
		</div>
	 </div>
	</section>
</template>

<script>
import DataViewer from './DataViewer'
	export default {
		components: {DataViewer},
		data(){
			return{
			model: {data: []},
			thead: [
			{label: 'Username'},
			{label: 'Full Name'},
			{label: 'Email'},
			{label: 'User Type'},
			{label: 'Created'}
			],
			source: '/md-vs2/manage/users',
			params: {
                    column: 'id',
                    direction: 'desc',
                    per_page: 10,
                    page: 1,
                    search_column: 'id',
                    search_operator: 'equal_to',
                    search_query_1: '',
                    search_query_2: ''
		        }
		    }
	     },
	     mounted(){
			this.fetchData()
			document.title = 'Manage Users'
			this.$store.commit('title_top_data', 'Manage Users')
		},
		methods: {
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
			fetchData(){
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
                return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}`
            }
		}
	}
</script>