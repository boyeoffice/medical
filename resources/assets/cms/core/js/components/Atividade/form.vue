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
                                        <br>
                                        <a href="javascript:void(0)" @click="showModal">Add Attachment</a>
                                        <br>
                                        <a :href="'/' + form.anexos" style="color: #0f0;" target="_blank" v-show="form.anexos">Download</a>
                                    </div>
                                </div>
                                <!--/.form-group-->
                            </div>
                            <router-link to="/atividade-cientifica" class="btn btn-sm btn-default">Cancel</router-link>
                            <a href="javascript:void(0)" v-if="$route.meta.mode == 'edit'" class="btn btn-sm btn-danger" @click="deleteForm">Delete</a>
                            <a href="javascript:void(0)" v-else class="btn btn-sm btn-danger" @click="clearForm">Clear</a>
                            <button class="btn btn-sm btn-primary" v-if="! isSaving">Save</button>
                            <button class="btn btn-sm btn-info" disabled v-else><i class="fa fa-spinner fa-spin"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <transition name="modal">
        <div id="modal-default" :class="{'modal': true, 'fade': true, 'in': fadeIn}" :style="{'display': display}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                          <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Default Title</h4>
                    </div>
                    <div class="modal-body">
                        <div :class="{'form-group': true, 'has-error': errors.name}">
                            <label for="">Name</label>
                            <input type="text" class="form-control" v-model="fileName">
                        </div>
                        <div class="form-group">
                            <label for="">Choose file</label>
                            <input type="file" ref="file" name="file" @change="addFile()" class="form-control">
                            <strong v-if="errors.file">{{ errors.file[0] }}</strong>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" @click="closeModal">Close</button>
                        <button class="btn btn-primary" disabled v-if="isLoading"><i class="fa fa-spinner fa-spin"></i> Loading..</button>
                        <button type="button" class="btn btn-primary" v-else @click="submitFile">Upload file</button>
                    </div>
                </div>
            </div>
        </div>
        </transition>
    </section>
</template>

<script>
import Form from './form.js'
export default Form
</script>
