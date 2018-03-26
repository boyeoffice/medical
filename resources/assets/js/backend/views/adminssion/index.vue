<template>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-boder">
						<h2 class="box-title">Adminssion</h2>
						<div class="box-tools">
							<router-link class="btn btn-success" to="/backend/adminssion/create">create</router-link>
						</div>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th v-for="th in thead">{{th.label}}</th>
								</tr>
							</thead>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default{
		data(){
			return{
				thead: [
				{label: 'ID'},
				{label: 'Iniciais Paciente'},
				{label: 'Primeira Consulta'},
				{label: 'Sexo'},
				{label: 'Idade'},
				{label: 'Origem'},
				{label: 'Especialidade Origem'},
				{label: 'Destino'},
				{label: 'Grupo ICD-10'},
				{label: 'ICD-10 Primário'},
				{label: 'ICD-10 Secundário'},
				{label: 'ICD-10 Secundário II'},
				{label: 'ICD-10 Secundário III'},
				{label: 'ICD-10 Secundário IV'},
				{label: 'ICD-10 Secundário V'},
				{label: 'ICD-10 Secundário V'},
				{label: 'Óbito'},
				{label: 'ICD-10 Óbito'},
				{label: 'Alta Destino'},
				{label: 'Alta Especialidade'},
				]
			}
		},
		mounted(){
			this.$store.commit('title_top_data', 'Adminssion')
		}
	}
</script>