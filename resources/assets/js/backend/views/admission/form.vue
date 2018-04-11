<template>
	<section class="content">
		<div class="box box-success">
			<div class="box-body">
				<form @submit.prevent="save">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
							<label>Iniciais Paciente</label>
							<input type="text" class="form-control" v-model="form.iniciais_paciente">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Data Entrada</label>
								<datepicker :bootstrapStyling="true" v-model="form.data_entrada" :calendarButton="true" calendarButtonIcon="fa fa-calendar" :required="true"></datepicker>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Data Saída</label>
								<datepicker :bootstrapStyling="true" v-model="form.data_saída" :calendarButton="true" calendarButtonIcon="fa fa-calendar" :required="true"></datepicker>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Dias Internamento</label>
								<input type="text" class="form-control" v-model="daysInHospital">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>Sexo</label>
							<select class="form-control" v-model="form.sexo">
								<option value="f">Female</option>
								<option value="m">Male</option>
							</select>
						  </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>Idade</label>
							<input type="text" class="form-control" v-model="form.idade">
						    </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>Origem</label>
							<vue-suggestions :suggestions="modelDest" :loading="isLoading.dest" @input="fetchDest" v-model="form.origem"></vue-suggestions>
						</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>Especialidade Origem</label>
							<vue-suggestions :suggestions="modelSpec" :loading="isLoading.spec" @input="fetchSpec" v-model="form.especialidade_origem"></vue-suggestions>
						   </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>Destino</label>
							<vue-suggestions :suggestions="modelDestino" :loading="isLoading.destino" @input="fetchDestino" v-model="form.destino"></vue-suggestions>
						   </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>Grupo ICD-10</label>
							<vue-suggestions :suggestions="modelGroup" :loading="isLoading.group" @input="fetchGroup" v-model="form.grupo_ICD_10"></vue-suggestions>
						  </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>ICD-10 Primário</label>
							<vue-suggestions :suggestions="modelSingle7" :loading="isLoading.single7" @input="fetchSingle7" v-model="form.ICD_10_primario"></vue-suggestions>
						   </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>ICD-10 Secundário</label>
							<vue-suggestions :suggestions="modelSingle" :loading="isLoading.single" @input="fetchSingle" v-model="form.ICD_10_secundario"></vue-suggestions>
						    </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>ICD-10 Secundário II</label>
							<vue-suggestions :suggestions="modelSingle2" :loading="isLoading.single2" @input="fetchSingle2" v-model="form.ICD_10_secundario_II"></vue-suggestions>
						   </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>ICD-10 Secundário III</label>
							<vue-suggestions :suggestions="modelSingle3" :loading="isLoading.single3" @input="fetchSingle3" v-model="form.ICD_10_secundario_III"></vue-suggestions>
						    </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>ICD-10 Secundário IV</label>
							<vue-suggestions :suggestions="modelSingle4" :loading="isLoading.single4" @input="fetchSingle4" v-model="form.ICD_10_secundario_IV"></vue-suggestions>
						    </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>ICD-10 Secundário V</label>
							<vue-suggestions :suggestions="modelSingle5" :loading="isLoading.single5" @input="fetchSingle5" v-model="form.ICD_10_secundario_V"></vue-suggestions>
						    </div>
						</div>
						<div class="col-sm-4">
						<div class="form-group">
							<label>Óbito</label>
							<select class="form-control" v-model="form.obito">
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select>
						</div>
					   </div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>ICD-10 Óbito</label>
							<vue-suggestions :suggestions="modelSingle6" :loading="isLoading.single6" @input="fetchSingle6" v-model="form.ICD_10_obito"></vue-suggestions>
						   </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>Alta Destino</label>
							<vue-suggestions :suggestions="modelAltaDestino" :loading="isLoading.alta" @input="altaDestino" v-model="form.alta_destino"></vue-suggestions>
						   </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							<label>Alta Especialidade</label>
							<vue-suggestions :suggestions="modelAltaSpec" :loading="isLoading.alta_spec" @input="fetchAltaSpec" v-model="form.alta_especialidade"></vue-suggestions>
						</div>
						</div>
					</div>
					<router-link to="/backend/admission" class="btn btn-default">Cancel</router-link>
					<a href="javascript:void(0)" @click="deleteForm" v-show="isDelete" class="btn btn-danger">Delete</a>
					<a href="javascript:void(0)" @click="clearForm" v-show="! isDelete" class="btn btn-danger">Empty</a>
					<button class="btn btn-primary" v-show="! isSending">Save</button>
					<button class="btn btn-primary" v-show="isSending"><i class="fa fa-spinner fa-spin"></i></button>
				</form>
			</div>
		</div>
	</section>
</template> 

<script>
import Form from './form.js'
export default Form
</script>