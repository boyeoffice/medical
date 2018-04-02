export default {
	data(){
		return{
			form:{},
			isSending: false
		}
	},
	mounted(){
		this.$store.commit('title_top_data', 'Manage Settings')	
		this.fectchData()
	},
	methods: {
		fectchData(){
			axios.get('/md-vs2/manage/setting').then(res => {
				this.form = res.data
			})
		},
		update(){
			this.isSending = true
		axios.put('/md-vs2/manage/setting', this.form).then(res => {
			this.isSending = false
			toastr.success('Setting was updated successfully')
		}).catch(err => {
			this.isSending = false
			toastr.warning('An error occurred')
		})
	}
	}
}