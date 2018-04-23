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
						<h3 class="box-tool">Pie Chart Consults</h3>
					</div>
					<div class="box-body">
						<pie-chart></pie-chart>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-tool">Pie Chart Admissão</h3>
					</div>
					<div class="box-body">
						<pie-chart></pie-chart>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	import Index from './index.js'
	export default Index
</script>