<template>
	<section class="content">
		<div class="row">
			<box :unit="stats.tech" :title="iTitle" :icon="techIcon"></box>
			<box :className="bgGreen" :unit="stats.consult" :title="gTitle" :icon="consultIcon"></box>
			<box :className="bgYellow" :unit="stats.user" :icon="userIcon"></box>
			<box :className="bgRed" :unit="stats.admission" :title="rTitle" :icon="admissionIcon"></box>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Distribuição Género Consultas</h3>
					</div>
					<div class="box-body">
						<pie-consultmf></pie-consultmf>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Distribuição Género Internamento</h3>
					</div>
					<div class="box-body">
						<pie-admissionmf></pie-admissionmf>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Origem Consultas</h3>
					</div>
					<div class="box-body">
						<pie-admin-origin></pie-admin-origin>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Origem Internamento</h3>
					</div>
					<div class="box-body">
						<pie-consult-origin></pie-consult-origin>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Número Internamentos</h3>
					</div>
					<div class="box-body">
						<graph-admin></graph-admin>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Número Consultas</h3>
					</div>
					<div class="box-body">
						<graph-consult></graph-consult>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import Box from '_/vendor/Box.vue'
import PieChart from '_/lib/pie.js'
import PieConsultmf from '_/lib/pie-consult-mf.js'
import PieAdmissionmf from '_/lib/pie-admission-mf.js'
import PieAdminOrigin from '_/lib/pie-admin-origin.js'
import PieConsultOrigin from '_/lib/pie-consult-origin.js'
import GraphAdmin from '_/lib/graph-admission.js'
import GraphConsult from '_/lib/graph-consult.js'

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
</script>
