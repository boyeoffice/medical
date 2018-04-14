export default {
	data(){
		return{
			isSending: false
		}
	},
	mounted(){
		this.$store.commit('title_top_data', 'Manage Settings')
	},
	methods: {
		update(){
			this.isSending = true
		axios.put('/md-vs2/manage/setting', this.settings).then(res => {
			this.isSending = false
			toastr.success('Setting was updated successfully')
		}).catch(err => {
			this.isSending = false
			toastr.warning('An error occurred')
		})
	}
	},
	computed: {
		settings(){
			return this.$store.state.settings
		}
	}
}