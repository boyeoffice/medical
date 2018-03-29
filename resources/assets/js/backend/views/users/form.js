export default {
		data(){
			return{
				isSending: false,
				errors: {},
				form: {},
				store: '/md-vs2/manage/users',
				initialize: '/md-vs2/manage/users',
				method: 'post',
				success: 'New user created successfully',
				isDelete: false
			}
		},
		beforeMount(){
			if(this.$route.meta.mode === 'edit'){
				this.$store.commit('title_top_data', 'Edit User')
				this.store = '/md-vs2/manage/users/' + this.$route.params.id
				this.initialize = '/md-vs2/manage/users/' + this.$route.params.id + '/edit'
				this.method = 'put'
				this.isDelete = true
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
			 if(this.form.id === this.$store.state.auth_user.id){
			 	toastr.warning('You cannot edit yourself')
			 	this.isSending = false
			 }else{
			 	axios[this.method](this.store, this.form).then(res => {
				console.log(res.data)
				toastr.success(this.success)
				this.$router.push('/backend/manage/users')
			    }).catch(err => {
				this.isSending = false
				this.errors = err.response.data
			  })
			 }
		  },
		  clearForm(){
		  	this.form = {}
		  },
		  deleteUser(){
		  	if(this.form.id === this.$store.state.auth_user.id){
			 	toastr.warning('You cannot delete yourself')
			 }else{
			 	axios.delete(this.store, this.form).then(res => {
			 		toastr.success('You deleted this user successfully')
			 		this.$router.push('/backend/manage/users')
			 	})
			 }
		  }
		}
	}