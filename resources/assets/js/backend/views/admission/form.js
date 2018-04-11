import VueInput from '../vendor/VueSuggestion'
import VueSuggestions from '../vendor/suggestions'
import Datepicker from 'vuejs-datepicker'
	export default{
		components: {VueInput, VueSuggestions, Datepicker},
		data(){
			return{
				isDelete: false,
				isSending: false,
				form: {
					origem: '',
					ICD_10_secundario: '',
					ICD_10_secundario_II: '',
					ICD_10_secundario_III: '',
					ICD_10_secundario_IV: '',
					ICD_10_secundario_V: '',
					ICD_10_obito: '',
					especialidade_origem: ''
				},
				store: '/md-vs2/manage/admission',
				method: 'post',
				initialize: '/md-vs2/manage/admission',
				//users: [],
				selectedName: '',
				modelGroup: [],
				modelDest: [],
				modelTech: [],
				modelSpec: [],
				modelSingle: [],
				modelSingle2: [],
				modelSingle3: [],
				modelSingle4: [],
				modelSingle5: [],
				modelSingle6: [],
				modelSingle7: [],
				modelDestino: [],
				modelAltaDestino: [],
				modelAltaSpec: [],
				isLoading: {
					dest: false,
					name: false,
					single: false,
					single2: false,
					single3: false,
					single4: false,
					single5: false,
					single6:false,
					single7: false,
					group: false,
					spec: false,
					destino: false,
					alta: false,
					alta_spec: false
					}
			}
		},
		beforeMount(){
			document.title = 'Admissão'
			this.$store.commit('title_top_data', 'Admissão')
			if(this.$route.meta.mode === 'edit'){
				this.initialize = '/md-vs2/manage/admission/' + this.$route.params.id + '/edit'
				this.store = '/md-vs2/manage/admission/' + this.$route.params.id
				this.method = 'patch'
				this.isDelete = true
				this.fetchData()
			}
		},
		methods: {
			save(){
				this.isSending = true
				axios[this.method](this.store, this.form).then(res => {
					this.$router.push('/backend/admission')
					this.isSending = false
					console.log(res.data)
				}).catch(err => {
					this.isSending = false
					if(err.response.status === 422){
						toastr.warning('Please fill all the fields!')
					}
				})
			},
			fetchData(){
				Nprogress.start()
				axios.get(this.initialize).then(res => {
					this.form = res.data
					Nprogress.done()
				})
			},
			deleteForm(){
				axios.delete(this.store).then(res => {
					toastr.success('Operation was successful!')
					this.$router.push('/backend/consults')
				}).catch(err => {
					toastr.danger('Operation failed!')
				})
			},
			//fetchUsers(){
				//this.isLoading.name = true
				//axios.get('/md-vs2/manage/all-users?search=' + this.selectedName).then(res => {
					//this.users = res.data
					//this.isLoading.name = false
				//})
			//},
			fetchGroup(){
				this.isLoading.group = true
				axios.get('/md-vs2/manage/search-query-group?search=' + this.form.ICD_10_secundario_II).then(res => {
					Vue.set(this.$data, 'modelGroup', res.data)
					this.isLoading.group = false
				})
			},
		  fetchSingle(){
		  	this.isLoading.single = true
				axios.get('/md-vs2/manage/search-query-single?search=' + this.form.ICD_10_secundario).then(res => {
					Vue.set(this.$data, 'modelSingle', res.data)
					this.isLoading.single = false
				})
			},
			 fetchSingle2(){
		  	this.isLoading.single2 = true
				axios.get('/md-vs2/manage/search-query-single?search=' + this.form.ICD_10_secundario_II).then(res => {
					Vue.set(this.$data, 'modelSingle2', res.data)
					this.isLoading.single2 = false
				})
			},
			 fetchSingle3(){
		  	this.isLoading.single3 = true
				axios.get('/md-vs2/manage/search-query-single?search=' + this.form.ICD_10_secundario_III).then(res => {
					Vue.set(this.$data, 'modelSingle3', res.data)
					this.isLoading.single3 = false
				})
			},
			fetchSingle4(){
		  	this.isLoading.single4 = true
				axios.get('/md-vs2/manage/search-query-single?search=' + this.form.ICD_10_secundario_IV).then(res => {
					Vue.set(this.$data, 'modelSingle4', res.data)
					this.isLoading.single4 = false
				})
			},
			fetchSingle5(){
		  	this.isLoading.single5 = true
				axios.get('/md-vs2/manage/search-query-single?search=' + this.form.ICD_10_secundario_V).then(res => {
					Vue.set(this.$data, 'modelSingle5', res.data)
					this.isLoading.single5 = false
				})
			},
			fetchSingle6(){
		  	this.isLoading.single6 = true
				axios.get('/md-vs2/manage/search-query-single?search=' + this.form.ICD_10_obito).then(res => {
					Vue.set(this.$data, 'modelSingle6', res.data)
					this.isLoading.single6 = false
				})
			},
			fetchSingle7(){
		  	this.isLoading.single7 = true
				axios.get('/md-vs2/manage/search-query-single?search=' + this.form.ICD_10_primario).then(res => {
					Vue.set(this.$data, 'modelSingle7', res.data)
					this.isLoading.single7 = false
				})
			},
			fetchDest(){
				this.isLoading.dest = true
				axios.get('/md-vs2/manage/searchdestination?search=' + this.form.origem).then(res => {
					Vue.set(this.$data, 'modelDest', res.data)
					this.isLoading.dest = false
				})
			},
			fetchDestino(){
				this.isLoading.destino = true
				axios.get('/md-vs2/manage/searchdestination?search=' + this.form.destino).then(res => {
					Vue.set(this.$data, 'modelDestino', res.data)
					this.isLoading.destino = false
				})
			},
			altaDestino(){
				this.isLoading.alta = true
				axios.get('/md-vs2/manage/searchdestination?search=' + this.form.alta_destino).then(res => {
					Vue.set(this.$data, 'modelAltaDestino', res.data)
					this.isLoading.alta = false
				})
			},
			fetchTech(){
				axios.get('/md-vs2/manage/query-tech').then(res => {
					Vue.set(this.$data, 'modelTech', res.data)
					this.fetchSpec()
				})
			},
			fetchSpec(){
				this.isLoading.spec = true
				axios.get('/md-vs2/manage/searchspecialty?search=' + this.form.especialidade_origem).then(res => {
					Vue.set(this.$data, 'modelSpec', res.data)
					this.isLoading.spec = false
				})
			},
			fetchAltaSpec(){
				this.isLoading.alta_spec = true
				axios.get('/md-vs2/manage/searchspecialty?search=' + this.form.alta_especialidade).then(res => {
					Vue.set(this.$data, 'modelAltaSpec', res.data)
					this.isLoading.alta_spec = false
				})
			},
			clearForm(){
				this.form = {}
			}
		},
		computed: {
			daysInHospital() {  
				var oneDay = 24*60*60*1000
				var dateIn = this.form.data_entrada
				var dateOut = this.form.data_saída
				var diffDays = Math.round(Math.abs((dateOut - dateIn)/(oneDay)))
				return this.form.dias_internamento = diffDays || this.form.dias_internamento
			}
		}
	}