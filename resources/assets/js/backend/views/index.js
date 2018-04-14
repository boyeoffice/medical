import Box from './vendor/Box.vue'
export default {
	components: {Box},
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
			gTitle: 'Consultas',
			rTitle: 'Admissão',
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