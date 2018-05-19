export default {
	data(){
		return{
			profile: window.User,
			pass: {},
			errors: {},
			passSaving: false,
			profileSaving: false
		}
	},
	methods: {
		updateProfile(){
			this.profileSaving = true
			axios.patch('/pt-v1/manage/profile', this.profile).then(res => {
				toastr.success('Profile update successfully')
				this.profileSaving = false
				this.errors = {}
			}).catch(err => {
				this.errors = err.response.data
				this.profileSaving = false
			})
		},
		updatePass(){
			this.passSaving = true
			axios.patch('/pt-v1/manage/password', this.pass).then(res => {
				this.passSaving = false
				toastr.success('Password updated successfully')
				this.errors = {}
			}).catch(err => {
				this.errors = err.response.data
				this.passSaving = false
			})
		}
	}
}