<template>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <form @submit.prevent="save">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                    <label for="tipo">Tipo</label>
                                    <select2 :options="modelTipo" v-model="form.tipo">
                                        <option disabled value="0">Select one</option>
                                    </select2>
                                    </div>
                                    <!--<div :class="{'form-group': true}">
                                        <label for="tipo">Tipo</label>
                                        <select class="form-control">
                                            <option value="Congresso">Congresso</option>
                                            <option value="Curso">Curso</option>
                                            <option value="Reunião">Reunião</option>
                                            <option value="Científica/Clínica">Científica/Clínica</option>
                                            <option value="Mesa">Mesa</option>
                                            <option value="Redonda">Redonda</option>
                                        </select>
                                    </div>-->
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" v-model="form.nome">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="entidade">Entidade Organizadora</label>
                                        <input type="text" class="form-control" v-model="form.entidade_organizadora">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="local">Local</label>
                                        <input type="text" class="form-control" v-model="form.local">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="data">Data</label>
                                        <input type="text" class="form-control" v-model="form.data">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                 <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nacional">Nacional/Internaciona</label>
                                        <select2 :options="modelLocal" v-model.number="form.nacional">
                                        <option disabled value="0">Select one</option>
                                        </select2>
                                        <!--<select class="form-control">
                                            <option value="Nacional">Nacional</option>
                                            <option value="Internaciona">Internaciona</option>
                                        </select>-->
                                    </div>
                                </div>
                                <!--/.form-group-->
                                 <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nota">Nota/Créditos</label>
                                        <input type="text" class="form-control" v-model="form.nota">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="observações">Observações</label>
                                        <input type="text" class="form-control" v-model="form.observacoes">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="anexos">Anexos</label>
                                        <input type="file" id="file" ref="file" @change="handleFileUpload" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                            </div>
                            <router-link to="/backend/formacao" class="btn btn-sm btn-default">Cancel</router-link>
                            <a href="javascript:void(0)" v-if="$route.meta.mode == 'edit'" class="btn btn-sm btn-danger" @click="deleteForm">Delete</a>
                            <a href="javascript:void(0)" v-else class="btn btn-sm btn-danger" @click="clearForm">Clear</a>
                            <button class="btn btn-sm btn-primary" v-if="! isSaving">Save</button>
                            <a href="javascript:void(0)" class="btn btn-sm btn-info" v-else disabled><i class="fa fa-spinner fa-spin"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Form from './form.js'
export default Form
</script>

