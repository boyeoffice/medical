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
	import Index from './index.js'
	export default Index
</script>