<template>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<data-viewer :source="source" :create="create" :title="title" :thead="thead" :BoxClass="BoxClass">
					<template slot-scope="props">
						<tr>
							<td>{{props.item.id}}</td>
							<td>{{props.item.user.name}}</td>
							<td>{{props.item.iniciais_paciente}}</td>
							<td>{{props.item.primeira_consulta}}</td>
							<td>{{props.item.sexo}}</td>
							<td>{{props.item.idade}}</td>
							<td>{{props.item.origem}}</td>
							<td>{{props.item.especialidade_origem}}</td>
							<td>{{props.item.destino}}</td>
							<td>{{props.item.grupo_ICD_10}}</td>
							<td>{{props.item.ICD_10_primario}}</td>
							<td>{{props.item.ICD_10_secundario}}</td>
							<td>{{props.item.ICD_10_secundario_II}}</td>
							<td>{{props.item.ICD_10_secundario_III}}</td>
							<td>{{props.item.ICD_10_secundario_IV}}</td>
							<td>{{props.item.ICD_10_secundario_V}}</td>
							<td>{{props.item.obito}}</td>
							<td>{{props.item.ICD_10_obito}}</td>
							<td>{{props.item.alta_destino}}</td>
							<td>{{props.item.alta_especialidade}}</td>
						</tr>
					</template>
				</data-viewer>
			</div>
		</div>
	</section>
</template>

<script>
import DataViewer from '../vendor/BoxTableRes.vue'
	export default{
		components: {DataViewer},
		data(){
			return{
				BoxClass: 'box box-primary',
				create: '/backend/consults/create',
				title: 'Consulta mi',
				source: '/md-vs2/manage/consult',
				thead: [
				{label: 'ID'},
				{label: 'Names of Patient'},
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
				{label: 'Óbito'},
				{label: 'ICD-10 Óbito'},
				{label: 'Alta Destino'},
				{label: 'Alta Especialidade'},
				]
			}
		},
		mounted(){
			this.$store.commit('title_top_data', 'Consultant')
		}
	}
</script>