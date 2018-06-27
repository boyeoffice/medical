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
                                        <select2 :options="dataTipo" v-model="form.tipo">
                                            <option value="0" disabled>Select one</option>
                                        </select2>
                                       <!-- <select class="form-control">
                                            <option value="Artigo">Artigo</option>
                                            <option value="Poster">Poster</option>
                                            <option value="Comunicação Livre">Comunicação Livre</option>
                                            <option value="Capítulo de Livro">Capítulo de Livro</option>
                                        </select>-->
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nome">Título</label>
                                        <input type="text" class="form-control" v-model="form.titulo">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="entidade">Nome da Revista/Livro</label>
                                        <input type="text" class="form-control" v-model="form.nome">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="local">Data</label>
                                        <input type="text" class="form-control" v-model="form.data">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                 <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nacional">Estado</label>
                                        <select2 :options="dataEstado" v-model="form.estado">
                                            <option value="0" disabled>Select one</option>
                                        </select2>
                                        <!--<select class="form-control">
                                            <option value="publicadol">Publicado</option>
                                            <option value="aguarda">Aguarda Publicação</option>
                                        </select>-->
                                    </div>
                                </div>
                                <!--/.form-group-->
                                 <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nota">Indexada à PubMed (PMID)</label>
                                        <select class="form-control" v-model="form.indexada">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="observações">Factor de Impacto à data da publicação</label>
                                        <input type="text" class="form-control" v-model="form.publicacao">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="observações">Autores</label>
                                        <input type="text" class="form-control" v-model="form.autores">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="observações">Abstract</label>
                                        <input type="text" class="form-control" v-model="form.abstract">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nota">Primeiro Autor</label>
                                        <select class="form-control" v-model="form.primeiro">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nota">Prémios</label>
                                        <select class="form-control" v-model="form.premios">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
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
                                        <input type="file" @change="handleFileUpload" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                            </div>
                            <router-link to="/backend/atividade-cientifica" class="btn btn-sm btn-default">Cancel</router-link>
                            <a href="javascript:void(0)" v-if="$route.meta.mode == 'edit'" class="btn btn-sm btn-danger" @click="deleteForm">Delete</a>
                            <a href="javascript:void(0)" v-else class="btn btn-sm btn-danger" @click="clearForm">Clear</a>
                            <button class="btn btn-sm btn-primary" v-if="! isSaving">Save</button>
                            <button class="btn btn-sm btn-info" disabled v-else><i class="fa fa-spinner fa-spin"></i></button>
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
