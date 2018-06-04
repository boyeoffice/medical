import Box from './vendor/Box.vue'
import PieChart from './lib/pie.js'
import PieConsultmf from './lib/pie-consult-mf.js'
import PieAdmissionmf from './lib/pie-admission-mf.js'
import PieAdminOrigin from './lib/pie-admin-origin.js'
import PieConsultOrigin from './lib/pie-consult-origin.js'
import GraphAdmin from './lib/graph-admission.js'
import GraphConsult from './lib/graph-consult.js'

export default {
	components: {Box, PieChart, PieConsultmf, PieAdmissionmf, PieAdminOrigin, PieConsultOrigin, GraphAdmin, GraphConsult},
	beforeMount(){
		document.title = 'Dashboard'
		this.$store.commit('title_top_data', 'Dashboard')
		this.fetchStats()
	},
	data(){
		return{
			bgGreen: 'small-box bg-green',
			bgYellow: 'small-box bg-yellow',
			bgRed: 'small-box bg-red',
			gTitle: 'Mortality Rate Consultas',
			rTitle: 'Mortality Rate Admissão',
			iTitle: 'Técnica',
			userIcon: 'ion ion-ios7-people-outline',
			admissionIcon: 'ion ion-ios7-medkit-outline',
			techIcon: 'ion ion-ios7-cog',
			consultIcon: 'ion ion-help-circled'
		}
	},
	methods: {
		fetchStats(){
			axios.get('/md-vs2/manage/stats').then(res => {
				this.$store.commit('stats_data', res.data)
			})
		}
	},
	computed: {
		stats(){
			return this.$store.state.stats
		}
	}
}