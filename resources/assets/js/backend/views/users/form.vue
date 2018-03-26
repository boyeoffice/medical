<template>
	<section class="content">
		<div class="box box-success">
			<div class="box-body">
				<form @submit.prevent="save">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Full Name</label>
								<input type="text" class="form-control" v-model="form.name">
								<span class="has-feedback" v-if="errors.name">{{errors.name[0]}}</span>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" v-model="form.username">
								<span class="has-feedback" v-if="errors.username">{{errors.username[0]}}</span>
							</div>
						</div>
						<!--/.col-sm-4 -->
						<div class="col-sm-4">
							<div class="form-group">
								<label>E-mail</label>
								<input type="email" class="form-control" v-model="form.email">
								<span class="has-feedback" v-if="errors.email">{{errors.email[0]}}</span>
							</div>
							<div class="form-group">
								<label>User Type</label>
								<select class="form-control" v-model="form.user_type">
									<option value="patient">Patient</option>
									<option value="client">Client</option>
									<option value="staff">Staff</option>
									<option value="adminstration">Adminstration</option>
								</select>
								<span class="has-feedback" v-if="errors.user_type">{{errors.user_type[0]}}</span>
							</div>
						</div>
						<!--/.col-sm-4 -->
						<div class="col-sm-4">
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" v-model="form.password">
								<span class="has-feedback" v-if="errors.password">{{errors.password[0]}}</span>
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" class="form-control" v-model="form.password_confirmation">
								<span class="has-feedback" v-if="errors.password">{{errors.password[0]}}</span>
							</div>
						</div>
						<!--/.col-sm-4 -->
					</div>
					<button class="btn btn-success" v-if="isSending"><i class="fa fa-spinner fa-spin"></i></button>
					<button v-else class="btn btn-success">Save</button>
					<a href="javascript:void(0)" class="btn btn-danger" @click.stop="clearForm">Clear</a>
				</form>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		data(){
			return{
				isSending: false,
				errors: {},
				form: {},
				store: '/md-vs2/manage/users',
				initialize: '/md-vs2/manage/users',
				method: 'post',
				success: 'New user created successfully'
			}
		},
		beforeMount(){
			if(this.$route.meta.mode === 'edit'){
				this.$store.commit('title_top_data', 'Edit User')
				this.store = '/md-vs2/manage/users/' + this.$route.params.id
				this.initialize = '/md-vs2/manage/users/' + this.$route.params.id + '/edit'
				this.method = 'patch'
				this.fetchData()
			}else{
			this.$store.commit('title_top_data', 'Create New User')	
			}
		},
		methods: {
			fetchData(){
				var vm = this
				Nprogress.start()
				axios.get(this.initialize).then(res => {
					Vue.set(vm.$data, 'form', res.data)
					Nprogress.done()
				}).catch(err => {
					console.log(err)
				})
			},
			save(){
			 this.isSending = true
			axios[this.method](this.store, this.form).then(res => {
				console.log(res.data)
				toastr.success(this.success)
				this.$router.push('/backend/manage/users')
			}).catch(err => {
				this.isSending = false
				this.errors = err.response.data
			})
		  },
		  clearForm(){
		  	this.form = {}
		  }
		}
	}
</script>