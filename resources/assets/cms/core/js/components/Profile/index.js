export default {
	data(){
		return{
			setPassword: false,
			isSaving: false,
			errors: {}
		}
	},
	computed:{
		user(){
			return this.$store.state.auth_user
		},
		uri(){
			return this.$store.state.url
		}
	},
	methods:{
		saveProfile(){
			this.isSaving = true
			axios.put('/md-vs2/manage/update-profile', this.user).then(res => {
				this.isSaving = false
				toastr.success('Profile changed')
				this.errors = {}
				this.setPassword = false
			}).catch(err => {
				this.isSaving = false
				this.errors = err.response.data
				toastr.warning('An error occurred')
			})
		},
		changePassword(){
			this.setPassword = true
		}
	}
}