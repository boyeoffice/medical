<template>
	<section class="content">
			<div class="row">
				<div class="col-md-4">
					<div class="box box-info">
						<div class="box-body">
							<form @submit.prevent="save">
							<div class="form-group" v-for="(item, index) in form.items">
								<label>Title</label>
								<div class="input-group">
								<input type="text" class="form-control" v-model="item.name">
								<div class="input-group-btn">
								<a class="btn btn-danger" @click="form.items.splice(index, 1)">&times;</a>
							    </div>   
							    </div>
							</div>
							<a href="javascript:void(0)" @click.stop="addLine" class="btn btn-success">AddLine</a>
							<button disabled="" v-if="isSending" class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i></button>
							<button v-else class="btn btn-primary">Save</button>
						</form>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">ICD 10</h3>
						</div>
						<div class="box-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Title</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="data in model.data">
									<td>{{data.name}}</td>
								    </tr>
								</tbody>
							</table>
						</div>
						<div class="box-footer">
							<div class="pagination-footer">
								<div class="paginate-item">
									<span>Per page:</span>
									<select v-model="params.per_page" @change="fetchData">
										<option>20</option>
										<option>50</option>
										<option>100</option>
									</select>
								</div>
								<div class="pagination-item">
					                <small>Showing {{model.from}} - {{model.to}} of {{model.total}}</small>
					            </div>
					            <div class="pagination-item">
				                <small>Current page: </small>
				                <input type="text" class="pagination-input" v-model="params.page"
				                    @keyup.enter="fetchData">
				                <small> of {{model.last_page}}</small>
				            </div>
				            <div class="pagination-item">
				                <button @click="prev" class="btn btn-default btn-sm">Prev</button>
				                <button @click="next" class="btn btn-default btn-sm">Next</button>
				            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
</template>

<script>
	export default {
		data(){
			return {
				isSending: false,
				form: {
					items: [
					{name:''},
					{name: ''},
					{name: ''}
					]
				},
				model: {
					data: []
				},
				source: '/md-vs2/manage/query-single',
				params: {
					column: 'id',
					per_page: 20,
					direction: 'asc',
					page: 1
				}
			}
		},
		mounted(){
			this.fetchData()
			document.title = 'ICD 10'
			this.$store.commit('title_top_data', 'ICD 10')
		},
		methods: {
			save(){
				this.isSending = true
				axios.post('/md-vs2/manage/query-single', this.form).then(res => {
					toastr.success('Operation was successfully')
					this.isSending =false
					this.form.items = [
					{name: ''},
					{name: ''},
					{name: ''}
					]
					this.fetchData()
				}).catch(err => {
					this.isSending = false
					if(err.response.status === 422){
						toastr.warning('Please fill all the form')
					}
				})
			},
			addLine(){
				this.form.items.push({name: ''})
			},
			fetchData(){
				Nprogress.start()
				axios.get(this.buildURL()).then(res => {
					Vue.set(this.$data, 'model', res.data)
					Nprogress.done()
				})
			},
			buildURL(){
				var p = this.params
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
</script>

<style scoped="scss">
	.filter {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    &-column {
        flex: 4;
        padding-right: 15px;
    }
    &-operator {
        flex: 4;
        padding-right: 15px;
    }
    &-input {
        flex: 6;
        padding-right: 15px;
    }
    &-btn {
        flex: 1;
    }
}

.pagination-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pagination-input {
    width: 45px;
}
</style>