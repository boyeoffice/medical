<template>
	<section class="content">
		<div class="box box-success">
			<div class="box-body">
				<form>
					<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Iniciais Paciente</label>
							<input type="text" class="form-control" v-model="form.iniciais_paciente">
						</div>
						<div class="form-group">
							<label>Alta Especialidade</label>
							<input type="text" class="form-control" v-model="form.alta_especialidade">
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-2">
						<div class="form-group">
							<label>Primeira Consulta</label>
							<select class="form-control" v-model="form.primeira_consulta">
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select>
						</div>
						<div class="form-group">
							<label>Sexo</label>
							<select class="form-control" v-model="form.sexo">
								<option value="f">Female</option>
								<option value="m">Male</option>
							</select>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-2">
						<div class="form-group">
							<label>Idade</label>
							<input type="text" class="form-control" v-model="form.idade">
						</div>
						<div class="form-group">
							<label>Óbito</label>
							<select class="form-control" v-model="form.obito">
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-4">
						<div class="form-group">
							<label>Origem</label>
							<input type="text" class="form-control" v-model="form.origem">
						</div>
						<div class="form-group">
							<label>Especialidade Origem</label>
							<input type="text" class="form-control" v-model="form.especialidade_origem">
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-4">
						<div class="form-group">
							<label>Destino</label>
							<input type="text" class="form-control" v-model="form.destino">
						</div>
						<div class="form-group">
							<label>Grupo ICD-10</label>
							<input type="text" class="form-control" v-model="form.grupo_ICD_10">
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-4">
						<div class="form-group">
							<label>ICD-10 Primário</label>
							<input type="text" class="form-control" v-model="form.ICD_10_primario">
						</div>
						<div class="form-group">
							<label>ICD-10 Secundário</label>
							<input type="text" class="form-control" v-model="form.ICD_10_secundario">
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-4">
						<div class="form-group">
							<label>ICD-10 Secundário II</label>
							<input type="text" class="form-control" v-model="form.ICD_10_secundario_II">
						</div>
						<div class="form-group">
							<label>ICD-10 Secundário III</label>
							<input type="text" class="form-control" v-model="form.ICD_10_secundario_III">
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-4">
						<div class="form-group">
							<label>ICD-10 Secundário IV</label>
							<input type="text" class="form-control" v-model="form.ICD_10_secundario">
						</div>
						<div class="form-group">
							<label>ICD-10 Secundário V</label>
							<input type="text" class="form-control" v-model="form.ICD_10_secundario">
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-4">
						<div class="form-group">
							<label>ICD-10 Óbito</label>
							<input type="text" class="form-control" v-model="form.ICD_10_obito">
						</div>
						<div class="form-group">
							<label>Alta Destino</label>
							<input type="text" class="form-control" v-model="form.alta_destion">
						</div>
					</div>
					<!-- ./col -->
					</div>
					<button class="btn btn-default">Cancel</button>
					<button class="btn btn-danger">Empty</button>
					<button class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</section>
</template> 

<script>
	export default{
		data(){
			return{
				form: {}
			}
		}
	}
</script>