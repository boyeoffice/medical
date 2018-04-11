<template>
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-success">
					<div class="box-body">
						<form @submit.prevent="save">
							<div :class="{'form-group': true}" v-for="(item, index) in form.items">
								<label>Title</label>
								<div class="input-group">
								<input type="text" class="form-control" v-model="item.name">
								<div class="input-group-btn">
								<a class="btn btn-danger" @click="form.items.splice(index, 1)">&times;</a>
							    </div>   
							    </div>
							</div>
							<a @click.stop="addLine" class="btn btn-success">AddLine</a>
							<button v-if="isSending" disabled="" class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i></button>
							<button v-else class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="box box-default">
					<div class="box-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>ICD 10</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="data in model">
									<td>{{data.name}}</td>
								</tr>
							</tbody>
						</table>
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
					{name: ''},
					{name: ''},
					{name: ''}
					]
				},
				model: [],
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
				axios.get('/md-vs2/manage/query-single').then(res => {
					Vue.set(this.$data, 'model', res.data)
				})
			}
		}
	}
</script>