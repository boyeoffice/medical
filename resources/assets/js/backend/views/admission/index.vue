<template>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<data-viewer :filter="filter" :source="source" :create="create" :title="title" :thead="thead" :BoxClass="BoxClass">
					<template slot-scope="props">
						<tr>
							<td class="col-md-2">{{props.item.id}}</td>
							<td width="100px">{{props.item.iniciais_paciente}}</td>
							<td>{{props.item.data_entrada | moment('Do MMMM YYYY')}}</td>
							<td>{{props.item.data_saída | moment('Do MMMM YYYY')}}</td>
							<td>{{props.item.dias_internamento}}</td>
							<td>{{props.item.sexo}}</td>
							<td>{{props.item.idade}}</td>
							<td>{{props.item.origem}}</td>
							<td>{{props.item.especialidade_origem}}</td>
							<td>{{props.item.reinternamento}}</td>
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
							<td>{{props.item.mort_30_dias}}</td>
							<td>{{props.item.observacoes}}</td>
							<td>{{props.item.user.name}}</td>
							<td>
								<router-link :to="'/backend/admission/' + props.item.id + '/edit'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></router-link>
							</td>
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
				authUser: window.User,
				BoxClass: 'box box-primary',
				create: '/backend/admission/create',
				title: 'Internamento',
				source: '/md-vs2/manage/admission',
				thead: [
				{label: 'ID'},
				{label: 'Processo'},
				{label: 'Data Entrada'},
				{label: 'Data Saída'},
				{label: 'Dias Internamento'},
				{label: 'Sexo'},
				{label: 'Idade'},
				{label: 'Origem'},
				{label: 'Especialidade Origem'},
				{label: 'Reinternamento'},
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
				{label: 'Mort 30 Dias'},
				{label: 'Observações'},
				{label: 'Created By'},
				{label: 'Action'}
				],
				filter: ['processo', 'sexo', 'obito']
			}
		},
		mounted(){
			this.$store.commit('title_top_data', 'Internamento')
			document.title = 'Internamento' //Admissão
		}
	}
</script>