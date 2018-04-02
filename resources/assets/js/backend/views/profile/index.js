export default {
	data(){
		return{
			form:{},
			isSaving: false
		}
	},
	computed:{
		user(){
			return this.form = this.$store.state.auth_user
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
			}).catch(err => {
				this.isSaving = false
				toastr.warning('An error occurred')
			})
		}
	}
}